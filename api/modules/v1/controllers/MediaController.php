<?php
namespace api\modules\v1\controllers;
use Yii;
use api\modules\v1\models\Test;
class MediaController extends Controller
{
	public $path;
	
	public function init(){
		$this->path = getcwd();
	}
	public function actionIndex() {
		$request = Yii::$app->request;
		return $request->getQueryParams();
	}
	public function actionCreate() {
		return $this->path;
	}
}