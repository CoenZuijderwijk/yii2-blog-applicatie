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

                'urlCreator' => function($action, $model, $key, $index, $url) { return "author/". $action . "?id=" . $key; },
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

            'urlCreator' => function($action, $model, $key, $index, $url) { return "author/". $action . "?id=" . $key; },
            'viewOptions' => ['title' => 'This will launch the blog details page.', 'data-toggle' => 'tooltip'],
            'updateOptions' => ['title' => 'This will launch the blog update page.', 'data-toggle' => 'tooltip'],
            'deleteOptions' => ['title' => 'This will launch the blog delete action.', 'data-toggle' => 'tooltip'],
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
            'value' => 'publish_date'
        ],
        [
            'attribute' => "title",
            'value' => 'title'
        ],
    ];
}

?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if(!Yii::$app->getUser()->isGuest) {
        echo "<p>" . Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) . "</p>";
    }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>
        $gridColumns,





    ]); ?>


</div>
