<?php

namespace app\models\dataModel\log;

class Blog extends \app\models\dataTable\log\Blog
{
    const SCEN_CREATE = 'create';
    const SCEN_UPDATE = 'update';

    public function rules()
    {
        return [
            [['title'], 'required', 'message' => '填写文章标题'],
            [['content'], 'required', 'message' => '填写文章内容'],
            [['date'], 'number', 'min' => 1, 'message' => '请提交时间戳日期格式'],
            [['sortid'], 'number', 'min' => 1, 'message' => '请选择文章所在分类']
        ];
    }

    public function scenarios()
    {
        return [
            self::SCEN_CREATE => ['title', 'content', 'date', 'sortid'],
            self::SCEN_UPDATE => ['title', 'content'],
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->date = time();
        }
        return parent::beforeSave($insert);
    }
}