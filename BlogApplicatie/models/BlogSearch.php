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
    public $author;

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
        // MW: Deze functie omschrijven zodat er geen dubbelingen zijn, voor bijv. de sorting is dat niet nodig 
        if (!Yii::$app->getUser()->isGuest) {
            $id = Yii::$app->getUser()->getIdentity()->getId();
            
            // MW: Als het goed is kun je het User-model direct binnenhalen als de identityClass goed staat ingesteld, zie: https://www.yiiframework.com/doc/guide/2.0/en/security-authentication#configuring-user
            $user = User::findOne($id);
            if ($user->accessLevel == 16) {
                $query = Blog::find()
                    ->where(["author_id" => $id]);
                $query->joinWith(['author']);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $dataProvider->sort->attributes['author'] = [
                    'asc' => ['user.username' => SORT_ASC],
                    'desc' => ['user.username' => SORT_DESC],
                ];

                $this->load($params);

                if (!$this->validate()) {
                    return $dataProvider;
                }

                $query->andFilterWhere([
                    'blog.id' => $this->id,
                    'blog.author_id' => $this->author_id,
                    'user.username' => $this->author,
                ]);

                $query
                    ->andFilterWhere(['like', 'blog.title', $this->title])
                    ->andFilterWhere(['like', 'blog.slug', $this->slug])
                    ->andFilterWhere(['like', 'blog.publish_date', $this->publish_date]);

                return $dataProvider;
            } else {
                $query = Blog::find();
                $query->joinWith(['author']);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $dataProvider->sort->attributes['author'] = [
                    'asc' => ['user.username' => SORT_ASC],
                    'desc' => ['user.username' => SORT_DESC],
                ];

                $this->load($params);

                if (!$this->validate()) {
                    return $dataProvider;
                }

                $query->andFilterWhere([
                    'blog.id' => $this->id,
                    'blog.author_id' => $this->author_id,
                    'user.username' => $this->author,
                ]);
                $query
                    ->andFilterWhere(['like', 'blog.title', $this->title])
                    ->andFilterWhere(['like', 'blog.slug', $this->slug])
                    ->andFilterWhere(['like', 'blog.publish_date', $this->publish_date]);

                return $dataProvider;
            }
        } else {
            $query = Blog::find();
            $query->joinWith(['author']);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $dataProvider->sort->attributes['author'] = [
                'asc' => ['user.username' => SORT_ASC],
                'desc' => ['user.username' => SORT_DESC],
            ];

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'blog.id' => $this->id,
                'blog.author_id' => $this->author_id,
                'user.username' => $this->author,
            ]);
            $query
                ->andFilterWhere(['like', 'blog.title', $this->title])
                ->andFilterWhere(['like', 'blog.slug', $this->slug])

                ->andFilterWhere(['like', 'blog.publish_date', $this->publish_date]);

            return $dataProvider;
        }

    }
}
