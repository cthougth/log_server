<?php

namespace app\modules\blog\controllers;

use yii;

class UeditorController extends \crazydb\ueditor\UEditorController
{


    public function init(){
        $this->config = [
            'imageActionName'      => 'uploadimage', /* 执行上传图片的action名称 */
            'imageFieldName'       => 'upfile', /* 提交的图片表单名称 */
            'imageMaxSize'         => 2048000, /* 上传大小限制，单位B */
            'imageAllowFiles'      => ['.png', '.jpg', '.jpeg', '.gif', '.bmp'], /* 上传图片格式显示 */
            'imageCompressEnable'  => true, /* 是否压缩图片,默认是true */
            'imageCompressBorder'  => 1600, /* 图片压缩最长边限制 */
            'imageInsertAlign'     => 'none', /* 插入的图片浮动方式 */
            'imageUrlPrefix'       => Yii::$app->params['hostUrl'],
            'imagePathFormat'      => '/upload/image/{yyyy}{mm}{dd}/{rand:6}{time}',
            'scrawlPathFormat'     => '/upload/image/{yyyy}{mm}{dd}/{rand:6}{time}',
            'snapscreenPathFormat' => '/upload/image/{yyyy}{mm}{dd}/{rand:6}{time}',
            'catcherPathFormat'    => '/upload/image/{yyyy}{mm}{dd}/{rand:6}{time}',
            'videoPathFormat'      => '/upload/video/{yyyy}{mm}{dd}/{rand:6}{time}',
            'filePathFormat'       => '/upload/file/{yyyy}{mm}{dd}/{rand:4}_{time}',
            'imageManagerListPath' => '/upload/image/',
            'fileManagerListPath'  => '/upload/file/',
        ];

        parent::init();
    }

    public function behaviors()
    {
        //return parent::behaviors();

        return array_merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['*'],
                    'Access-Control-Allow-Methods' => ['OPTIONS','GET','PUT','POST','DELETE'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Request-Headers' => ['X_Requested_With'],
                ],
            ],
        ]);

    }

}
