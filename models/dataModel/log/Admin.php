<?php
namespace app\models\dataModel\log;

class Admin extends \app\models\dataTable\log\Admin
{
    public function rules()
    {
        return [
            [['id', 'username', 'password', 'passsalt', 'addtime'], 'required'],
            [['id', 'addtime', 'forbid'], 'integer'],
            [['username', 'passsalt'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 80],
            [['id', 'username'], 'unique'],
        ];
    }

    //设置场景
}