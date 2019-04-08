<?php
namespace app\models\dataModel\log;

class Category extends \app\models\dataTable\log\Category
{
    const SCEN_CREATE = 'create';
    const SCEN_UPDATE = 'update';
    const SCEN_CHANGE_PARENT = 'change_parent';

    public function rules()
    {
        return [
            [['cate_name'], 'required','message' => '填写分类名称'],
            [['parentid'], 'integer','message' => '填写正确的分类ID'],
            [['cate_name'], 'string', 'max' => 30 ,'message' => '分类名称最大长度为30字节'],
            [['description'], 'string', 'max' => 100 ,'message' => '分类介绍最大长度为100字节'],
        ];
    }


    public function scenarios(){
        return [
            self::SCEN_CREATE => ['cate_name','parentid','description'],
            self::SCEN_UPDATE => ['cate_name','description'],
            self::SCEN_CHANGE_PARENT => ['parentid'],
        ];
    }
}