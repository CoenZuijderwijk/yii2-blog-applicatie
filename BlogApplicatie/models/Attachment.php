<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachment".
 *
 * @property int $id
 * @property int $blog_id
 * @property string|null $file_name
 * @property string|null $file_extension
 * @property string|null $file_full_name
 *
 * @property Blog $blog
 */
class Attachment extends \yii\db\ActiveRecord
{
    public $files;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id'], 'required'],
            [['blog_id'], 'integer'],
            [['file_full_name'], 'string'],
            [['file_name', 'file_extension'], 'string', 'max' => 255],
            [['files'], 'safe'],
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
            'file_name' => 'File Name',
            'file_extension' => 'File Extension',
            'file_full_name' => 'File Full Name',
        ];
    }

    /**
     * Gets query for [[Blog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }
}
