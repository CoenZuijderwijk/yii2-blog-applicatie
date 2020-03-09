<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

/**
 * CommentSearch represents the model behind the search form of `app\models\Comment`.
 */
class CommentSearch extends Comment
{
    public $blogSearch;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'blog_id'], 'integer'],
            [['publish_date', 'title', 'slug', 'blogSearch'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Comment::find();
        $query->joinWith(['blog']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['blogSearch'] = [
            'asc' => ['blog.title' => SORT_ASC],
            'desc' => ['blog.title' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'comment.id' => $this->id,
            'comment.blog_id' => $this->blog_id,
            'comment.publish_date' => $this->publish_date,
        ]);

        $query->andFilterWhere(['like', 'comment.title', $this->title])
            ->andFilterWhere(['like', 'comment.slug', $this->slug])
            ->andFilterWhere(['like', 'blog.title', $this->blogSearch]);

        return $dataProvider;
    }
}
