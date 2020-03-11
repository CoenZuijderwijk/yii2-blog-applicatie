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
        if (!Yii::$app->getUser()->isGuest) {
            $user = Yii::$app->getUser()->getIdentity();

            if ($user->accessLevel == 16) {
                $query = Blog::find()
                    ->where(["author_id" => $user->getId()]);
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

                $query = $this->standardQuery($query);

                return $dataProvider;
            } else {
                $query = Blog::find();
                $query->joinWith(['author']);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);
                
                // MW: waarom zit hier nodig een dubbeling met hierboven?
                $dataProvider->sort->attributes['author'] = [
                    'asc' => ['user.username' => SORT_ASC],
                    'desc' => ['user.username' => SORT_DESC],
                ];

                $this->load($params);

                if (!$this->validate()) {
                    return $dataProvider;
                }

                $query = $this->standardQuery($query);

                return $dataProvider;
            }
        } else {
            $query = Blog::find();
            $query->joinWith(['author']);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            
            // MW: waarom zit hier nodig een dubbeling met hierboven?
            $dataProvider->sort->attributes['author'] = [
                'asc' => ['user.username' => SORT_ASC],
                'desc' => ['user.username' => SORT_DESC],
            ];

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }


            $query = $this->standardQuery($query);

            return $dataProvider;
        }

    }

    // MW: Wat doet deze functie?
    public function standardQuery($query)
    {
        $query->andFilterWhere([
            'blog.id' => $this->id,
            'blog.author_id' => $this->author_id,
            'user.username' => $this->author,
        ]);

        $query
            ->andFilterWhere(['like', 'blog.title', $this->title])
            ->andFilterWhere(['like', 'blog.slug', $this->slug])
            ->andFilterWhere(['like', 'blog.publish_date', $this->publish_date]);

        return $query;
    }
}
