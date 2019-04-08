<?php
namespace app\models\dataModel\log;

class Sort extends \app\models\dataTable\log\Sort
{
    const SCEN_CREATE = 'create';
    const SCEN_UPDATE = 'update';

    public function rules()
    {
        return [
            [['sortname'], 'required','message' => '填写分类名称'],
            [['pid'], 'integer','message' => '填写正确的分类ID'],
            [['sortname'], 'string', 'max' => 30 ,'message' => '分类名称最大长度为30字节'],
            [['description'], 'string', 'max' => 100 ,'message' => '分类介绍最大长度为100字节'],
            [['sortname'],'unique','message'=>'分类名称已使用'],
        ];
    }


    public function scenarios(){
        return [
            self::SCEN_CREATE => ['sortname','pid','alias','taxis','description','template'],
            self::SCEN_UPDATE => ['sortname','pid','alias','taxis','description','template'],
        ];
    }
}