<?php

namespace app\models;

use app\models\Blog;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BlogSearch represents the model behind the search form of `app\models\Blog`.
 * @property mixed author
 */
class BlogSearch extends Blog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['publish_date', 'title', 'slug', 'author'], 'safe'],
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
        if (!Yii::$app->getUser()->isGuest) {
            $id = Yii::$app->getUser()->getIdentity()->getId();
            $user = User::findOne($id);
            if ($user->accessLevel == 16) {
                $query = Blog::find()
                    ->where(["author_id" => $id]);
                $query->joinWith(['author']);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $dataProvider->sort->attributes['author'] = [
                    'asc' => ['tbl_author.username' => SORT_ASC],
                    'desc' => ['tbl_author.username' => SORT_DESC],
                ];

                $this->load($params);

                if (!$this->validate()) {
                    return $dataProvider;
                }

                $query->andFilterWhere([
                    'id' => $this->id,
                    'publish_date' => $this->publish_date,
                ]);

                $query
                    ->andFilterWhere(['like', 'title', $this->title])
                    ->andFilterWhere(['like', 'slug', $this->slug]);

                return $dataProvider;
            } else {
                $query = Blog::find();
                $query->joinWith(['author']);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $dataProvider->sort->attributes['author'] = [
                    'asc' => ['tbl_author.username' => SORT_ASC],
                    'desc' => ['tbl_author.username' => SORT_DESC],
                ];

                $this->load($params);

                if (!$this->validate()) {
                    return $dataProvider;
                }

                $query->andFilterWhere([
                    'id' => $this->id,
                    'author' => $this->author,
                    'publish_date' => $this->publish_date,
                ]);
                $query
                    ->andFilterWhere(['like', 'title', $this->title])
                    ->andFilterWhere(['like', 'slug', $this->slug]);

                return $dataProvider;
            }
        } else {
            $query = Blog::find();
            $query->joinWith(['author']);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->sort->attributes['author'] = [
                'asc' => ['tbl_author.username' => SORT_ASC],
                'desc' => ['tbl_author.username' => SORT_DESC],
            ];

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id' => $this->id,
                'author' => $this->author,
                'publish_date' => $this->publish_date,
            ]);
            $query
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'slug', $this->slug]);

            return $dataProvider;
        }

    }
}
