<?php

namespace app\models\dataTable\log;

use Yii;

/**
 * This is the model class for table "blog_category".
 *
 * @property int $id
 * @property string $cate_name
 * @property string $description
 * @property int $parentid
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_name'], 'required'],
            [['parentid'], 'integer'],
            [['cate_name'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_name' => 'Cate Name',
            'description' => 'Description',
            'parentid' => 'Parentid',
        ];
    }
}
