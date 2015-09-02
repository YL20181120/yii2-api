<?php
namespace api\modules\v1\controllers;
use Yii;
use yii\web\UploadedFile;
use api\modules\v1\exceptions\ErrorException;
use api\modules\v1\models\Media;
class MediaController extends Controller
{
	public $path;
	private $form_params = "media";
	public function init(){
		$this->path = getcwd().'/../uploads/';
	}
	public function actionView($id) {
		$media = Media::findOne($id);
		if($media){
			//Yii::$app->response->sendFile($this->path . $media->newname);
			Yii::$app->response->sendContentAsFile("sdf", "media");
		} else {
			throw new ErrorException("{$id} file not exist!");
		}
	}
	public function actionCreate() {
		$file = UploadedFile::getInstanceByName($this->form_params);
		
		if(!$file){
			throw new ErrorException("media file can't null",400);
		}
		if("jpg" != $file->extension){
			throw new ErrorException("media extension must be jpg",400);
		}
		
		$uuid = uniqid();
		$filename = "IMG_" . $uuid .".".$file->extension;
		try{
			$file->saveAs($this->path . $filename);
		} catch (\Exception $e) {
			throw new ErrorException("The path can't writen",500);
		}
		try{
			$media = new Media();
			$media->id = $uuid;
			$media->name = urldecode($file->name);
			$media->type = $file->extension;
			$media->size = $file->size;
			$media->newname = $filename;
			$media->user    = Yii::$app->user->identity->username;
			$media->save();
		} catch (\Exception $e) {
			throw new ErrorException("Write db error!",500);
		}
		
		return [
				'code' => 200,
				'message' => "ok",
				'media_id'     => $uuid
		];
	}
}