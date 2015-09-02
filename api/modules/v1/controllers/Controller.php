<?php
namespace api\modules\v1\controllers;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Response;

class Controller extends \yii\rest\Controller
{
	public function behaviors(){
		$behaviors = parent::behaviors();
		$behaviors['authenticator'] = [
				'class'		=> QueryParamAuth::className(),
				'tokenParam'=> 'access_token',
		];
		//unset($behaviors['contentNegotiator']['formats']);
		$behaviors['contentNegotiator']['formats']['application/xml'] = Response::FORMAT_JSON;
		$behaviors['rateLimiter']['enableRateLimitHeaders'] = false;
		return $behaviors;
	}
}