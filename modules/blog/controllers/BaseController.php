<?php
namespace app\modules\blog\controllers;

use Yii;
use yii\rest\Controller;

abstract class BaseController extends Controller {

    const SUCCESS_STATUS = '200';
    const FAIL_STATUS = '-1';

    public function beforeAction($action){
        $response = Yii::$app->response;
        $response->headers->add('Access-Control-Allow-Origin', '*');
        return parent::beforeAction($action);
    }

    public function success(array $data ,$message = ''){
        return [
            'status' => self::SUCCESS_STATUS,
            'data' => $data,
            'message' => $message,
        ];
    }

    public function fail($message = ''){
        return [
            'status' => self::FAIL_STATUS,
            'message' => $message,
        ];
    }
}