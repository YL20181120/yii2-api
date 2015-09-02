<?php
namespace api\modules\v1\controllers;
use Yii;

class HelloController extends Controller
{
	public function actionIndex() {
		$request = Yii::$app->request;
		return $request->getQueryParams();
	}
	public function actionCreate() {
		$post = Yii::$app->request->post();

		$file = \yii\web\UploadedFile::getInstanceByName('test');
		if($file){
			return [
					'code' => 200,
					'message' => 'ok',
					'extension'=> $file
			];
		} else {
			return [
					'code' => 300,
					'message' => 'no-object'
			];
		}
	}
}