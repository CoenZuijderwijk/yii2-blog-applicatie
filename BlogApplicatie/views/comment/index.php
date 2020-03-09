<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    [
        'attribute' => "id",
        'value' => 'id'
    ],
    [
        'attribute' => "blog_id",
        'value' => 'blog_id'
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
        'attribute' => "slug",
        'value' => 'slug'
    ],
    [
        'attribute' => "blogSearch",
        'value' => 'blog.title',
        'label' => 'Blog title',

    ],
    [
        'class' => 'kartik\grid\ActionColumn',

        'urlCreator' => function($action, $model, $key, $index, $url) { return "/comment/". $action . "?id=" . $key; },
        'viewOptions' => ['title' => 'This will launch the blog details page.', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['title' => 'This will launch the blog update page.', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['title' => 'This will launch the blog delete action.', 'data-toggle' => 'tooltip'],
        'headerOptions' => ['class' => 'kartik-sheet-style'],
    ],
]
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>
            $gridColumns,

    ]); ?>


</div>
