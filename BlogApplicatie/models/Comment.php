<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Comment".
 *
 * @property int $id
 * @property int $blog_id
 * @property string $publish_date
 * @property string $title
 * @property string $slug
 */
class Comment extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'publish_date', 'title', 'slug'], 'required'],
            [['blog_id'], 'integer'],
            [['publish_date', 'blog'], 'safe'],
            [['title', 'slug',], 'string', 'max' => 255],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => 'Blog ID',
            'publish_date' => 'Publish Date',
            'title' => 'Title',
            'slug' => 'Slug',
            'blog' => 'Blog Title'
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }
}
