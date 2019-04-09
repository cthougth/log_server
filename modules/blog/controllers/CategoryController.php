<?php
namespace app\modules\blog\controllers;

use yii;
use app\models\dataModel\log\Sort;

class CategoryController extends CurdController
{

    protected function getDataRecord(){
        return new Sort();
    }

    protected function setScenarios(){
        $this->scenCreate = 'create';
        $this->scenUpdate = 'update';
    }

    protected function getPrimaryKey(){
        return Sort::primaryKey()[0];
    }

    public function getDataModel(){
        return Sort::find();
    }

    protected function listModel($active){
        $condition = [];
        $condition['pid'] = Yii::$app->request->get('pid',0);
        return $active->select('sid,sortname,pid')->where($condition);
    }

    public function actionListAll()
    {
        $categorys = Sort::find()->select('sid,sortname,pid')->orderBy('sid asc')->asArray()->all();
        return $this->success([
            'list' => $categorys
        ]);
    }


}