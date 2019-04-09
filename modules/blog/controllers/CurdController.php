<?php

namespace app\modules\blog\controllers;

use yii;
use yii\db\ActiveRecord;
use yii\behaviors;

abstract class CurdController extends BaseController
{
    protected $scenCreate = '';
    protected $scenUpdate = '';

    protected $listField = '*';

    abstract protected function getDataRecord();

    /**
     * @return ActiveRecord
     */
    abstract protected function getDataModel();

    abstract protected function setScenarios();

    abstract protected function getPrimaryKey();

    /**
     * @return ActiveRecord
     */
    abstract protected function listModel($active);

    public function beforeAction($action)
    {
        $model = $this->getDataRecord();
        if (empty($this->scenCreate) || empty($model)) {
            return $this->fail('错误的信息类型');
        }
        if (!($model instanceof ActiveRecord)) {
            return $this->fail('错误的信息类型');
        }
        if (!$this->getPrimaryKey()) {
            return $this->fail('错误的信息类型');
        }
        return parent::beforeAction($action);
    }

    public function init()
    {
        parent::init();
        $this->setScenarios();
    }

    public function actionCreate()
    {
        $model = $this->getDataRecord();
        $model->setScenario($this->scenCreate);
        $model->load([$model->formName() => Yii::$app->request->post()]);
        if ($model->validate()) {
            $model->save();
            return $this->success([], '添加成功');
        } else {
            $errors = $model->getErrors();
            $message = '';
            foreach ($errors as $key => $item) {
                $message .= implode(',', $item);
            }
            return $this->fail('添加失败:' . $message);
        }
    }

    public function actionList()
    {
        $page = Yii::$app->request->get('page', 1);
        $pageSize = Yii::$app->request->get('pagesize', 10);
        $activeRecord = $this->listModel($this->getDataModel());
        $count = $activeRecord->count();
        if ($count) {
            $result = $activeRecord->offset(($page - 1) * $pageSize)
                ->limit($pageSize)->asArray()->all();
            return $this->success(['total' => $count, 'data' => $result]);
        } else {
            return $this->success(['total' => 0, 'data' => []]);
        }
    }

    public function actionUpdate()
    {
        $id = Yii::$app->request->post('id', 0);
        if (empty($id)) {
            return $this->fail('缺少信息编号');
        }

        $model = $this->getDataModel()->where([$this->getPrimaryKey() => $id])->one();
        $model->setScenario($this->scenUpdate);
        $post = Yii::$app->request->post();
        //$post[$this->getPrimaryKey()] = $id;
        if ($model->load($post) && $model->save()) {
            return $this->success('更新成功');
        }else{
            $errors = $model->getErrors();
            $message = '';
            foreach ($errors as $key => $item) {
                $message .= implode(',', $item);
            }
            return $this->fail('更新失败:' . $message);
        }
    }

    public function actionDelete()
    {

    }

    public function actionInfo()
    {
        $id = Yii::$app->request->get('id', 0);
        if (empty($id)) {
            return $this->fail('缺少信息编号');
        }
        $model = $this->getDataModel();
        $select = Yii::$app->request->get('field', '*');
        $data = $model->select($select)->where([$this->getPrimaryKey() => $id])->asArray()->one();
        return $data ? $this->success($data) : $this->success([],'没有找到信息数据');
    }
}