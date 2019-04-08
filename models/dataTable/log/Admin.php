<?php

namespace app\models\dataTable\log;

use Yii;

/**
 * This is the model class for table "blog_admin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $passsalt
 * @property int $addtime
 * @property int $forbid
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'password', 'passsalt', 'addtime'], 'required'],
            [['id', 'addtime', 'forbid'], 'integer'],
            [['username', 'passsalt'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 80],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'passsalt' => 'Passsalt',
            'addtime' => 'Addtime',
            'forbid' => 'Forbid',
        ];
    }
}
