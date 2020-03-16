<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int $author_id
 * @property string $publish_date
 * @property string $title
 * @property string $slug
 * @property string $inleiding
 * @property array $attachment
 */
class Blog extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'publish_date', 'title', 'slug'], 'required'],
            [['author_id'], 'integer'],
            [['publish_date', 'author'], 'safe'],
            [['title', 'inleiding'], 'string', 'max' => 255],
            [['file'], 'file'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'publish_date' => 'Publish Date',
            'title' => 'Title',
            'slug' => 'Slug',
            'inleiding' => 'Inleiding',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function setDate() {
        $this->date = date('Y-m-d H:i:s');
    }
}
