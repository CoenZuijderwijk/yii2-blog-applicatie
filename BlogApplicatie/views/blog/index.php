<?php

use app\models\User;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;

if(!Yii::$app->getUser()->isGuest){

    $user = User::findOne(Yii::$app->getUser()->getId());
    if($user->getAccessLevel() >= 40) {
        $gridColumns = [
            [
                'attribute' => "id",
                'value' => 'id'
            ],
            [
                'attribute' => "author_id",
                'value' => 'author_id'
            ],
            [
                'attribute' => "author",
                'value' => 'author.username'
            ],
            [
                'attribute' => "publish_date",
                'value' => 'publish_date'
            ],
            [
                'attribute' => "title",
                'value' => 'title'
            ],
            [
                'class' => 'kartik\grid\ActionColumn',

                'urlCreator' => function($action, $model, $key, $index, $url) { return "/blog/". $action . "?id=" . $key; },
                'viewOptions' => ['title' => 'This will launch the blog details page.', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => 'This will launch the blog update page.', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'This will launch the blog delete action.', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
        ];
    } else {
    $gridColumns = [
        [
            'attribute' => "id",
            'value' => 'id'
        ],
        [
            'attribute' => "publish_date",
            'value' => 'publish_date'
        ],
        [
            'attribute' => "title",
            'value' => 'title'
        ],
        [
            'class' => 'kartik\grid\ActionColumn',

            'urlCreator' => function($action, $model, $key, $index, $url) { return "/blog/". $action . "?id=" . $key; },
            'viewOptions' => ['title' => 'This will launch the blog details page.', 'data-toggle' => 'tooltip'],
            'updateOptions' => ['title' => 'This will launch the blog update page.', 'data-toggle' => 'tooltip', 'name' => 'updateBlog'],
            'deleteOptions' => ['title' => 'This will launch the blog delete action.', 'data-toggle' => 'tooltip', 'name' => 'deleteBlog'],
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
    ];
    }
} else {
    $gridColumns = [
        [
            'attribute' => "id",
            'value' => 'id'
        ],

        [
            'attribute' => "author",
            'value' => 'author.username'
        ],
        [
            'attribute' => "publish_date",
            'value' => 'publish_date',
        ],
        [
            'attribute' => "title",
            'value' => 'title'
        ],
    ];
}

?>
<div class="blog-index">
<?php if(!Yii::$app->getUser()->isGuest) {
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if (!Yii::$app->getUser()->isGuest) {
        echo  Html::a('Create Blog', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-right: 1%']) ;
        $user = User::findOne(Yii::$app->getUser()->getId());
        if($user->getAccessLevel() >= 98) {
            echo Html::a('Comment overview', ['comment/index'], ['class' => 'btn btn-success']);
        }
    }
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>
            $gridColumns,

    ]);
    } else {?>
    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    echo "<div class'row'>";
    foreach($models as $model) {
        echo "<div class=' col-xs-12 col-sm-6 col-m-4 col-lg-4' style='padding-bottom: 25px; padding: 1%; background-color: white    '>";
        echo "<div class='border border-danger'>";
        echo "<h3><a href='/blog/view?id=" . $model->id . "' style='text-decoration: none'>" . $model->title  . "</a>";
        echo "<p>" . $model->inleiding . "</p>";
        echo "</div></div>";
    }
    echo "</div>";
    ?>

    <?php } ?>

</div>
