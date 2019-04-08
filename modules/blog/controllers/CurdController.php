<?php
namespace app\modules\blog\controllers;

use yii;
use yii\db\ActiveRecord;

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

    /**
     * @return ActiveRecord
     */
    abstract protected function listModel( $active);

    public function init(){
        parent::init();
        $this->setScenarios();
    }

    public function actionCreate()
    {
        if(empty($this->scenCreate) || empty($this->getDataRecord())){
            return $this->fail('错误的信息类型');
        }
        $model = $this->getDataRecord();
        if(!($model instanceof ActiveRecord)){
            return $this->fail('错误的信息类型');
        }
        $model->setScenario($this->scenCreate);
        $model->load([$model->formName() => Yii::$app->request->post()]);
        if($model->validate()){
            $model->save();
            return $this->success([],'添加成功');
        }else{
            $errors = $model->getErrors();
            $message = '';
            foreach($errors as $key => $item){
                $message .= implode(',',$item);
            }
            return $this->fail('添加失败:'.$message);
        }
    }

    public function actionList(){
        $page = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pagesize',10);
        $activeRecord = $this->listModel($this->getDataModel());
        $count = $activeRecord->count();
        if($count){
            $result = $activeRecord->offset(($page - 1) * $pageSize)
                ->limit($pageSize)->asArray()->all();
            return $this->success(['total' => $count , 'data' => $result]);
        }else{
            return $this->success(['total' => 0 , 'data' => []]);
        }
    }

    public function actionUpdate(){

    }

    public function actionDelete(){

    }
}