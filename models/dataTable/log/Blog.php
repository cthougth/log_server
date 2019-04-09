<?php

namespace app\models\dataTable\log;

use Yii;

/**
 * This is the model class for table "emlog_blog".
 *
 * @property string $gid
 * @property string $title
 * @property string $date
 * @property string $content
 * @property string $excerpt
 * @property string $alias
 * @property int $author
 * @property int $sortid
 * @property string $type
 * @property string $views
 * @property string $comnum
 * @property string $attnum
 * @property string $top
 * @property string $sortop
 * @property string $hide
 * @property string $checked
 * @property string $allow_remark
 * @property string $password
 * @property string $template
 * @property string $tags
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emlog_blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'content', 'excerpt'], 'required'],
            [['date', 'author', 'sortid', 'views', 'comnum', 'attnum'], 'integer'],
            [['content', 'excerpt', 'top', 'sortop', 'hide', 'checked', 'allow_remark', 'tags'], 'string'],
            [['title', 'password', 'template'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'title' => 'Title',
            'date' => 'Date',
            'content' => 'Content',
            'excerpt' => 'Excerpt',
            'alias' => 'Alias',
            'author' => 'Author',
            'sortid' => 'Sortid',
            'type' => 'Type',
            'views' => 'Views',
            'comnum' => 'Comnum',
            'attnum' => 'Attnum',
            'top' => 'Top',
            'sortop' => 'Sortop',
            'hide' => 'Hide',
            'checked' => 'Checked',
            'allow_remark' => 'Allow Remark',
            'password' => 'Password',
            'template' => 'Template',
            'tags' => 'Tags',
        ];
    }
}
