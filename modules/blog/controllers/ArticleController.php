<?php

namespace app\modules\blog\controllers;

use app\models\dataModel\log\Category;

class ArticleController extends CurdController
{
    protected function getDataRecord()
    {
        return Category::find();
    }

    protected function setScenarios(){

    }

    public function actionCategoryList()
    {

    }

    public function actionCategoryCreate()
    {

    }
}