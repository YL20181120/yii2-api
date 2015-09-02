<?php
namespace api\modules\v1\exceptions;

use Yii;
use yii\web\HttpException;

class ErrorException extends \yii\web\HttpException
{
	public function __construct($message,$code = 0,$status = 200,\Exception $previous = null){
		parent::__construct($status,$message,$code,$previous);
	}
	public function getName(){
		return "Api Error";
	}
}