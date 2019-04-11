<?php
namespace app\modules\blog\controllers;

use app\models\dataModel\log\Blog;
use yii;

class BlogController extends CurdController
{
    protected function getDataRecord()
    {
        return new Blog();
    }

    protected function setScenarios()
    {
        $this->scenCreate = Blog::SCEN_CREATE;
        $this->scenUpdate = Blog::SCEN_UPDATE;
    }

    protected function getPrimaryKey()
    {
        return Blog::primaryKey()[0];
    }

    public function getDataModel()
    {
        return Blog::find();
    }

    protected function listModel($active)
    {
        $condition = [];
        $sortId = Yii::$app->request->get('sortid', 0);
        if($sortId){
            $condition['sortid'] = $sortId;
        }
        $field = Yii::$app->request->get('field','title,sortid,date,gid,sortname');
        if(!empty($condition)){
            $active->where($condition);
        }
        return $active->select($field)->joinWith('sort',false)->orderBy('gid desc');
        //return empty($condition) ? $active->select($field)->orderBy('gid desc') :
        //    $active->select($field)->where($condition)->orderBy('gid desc');
    }
}