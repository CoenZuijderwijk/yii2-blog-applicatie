<?php

use app\models\User;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;

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
?>
<div class="blog-index">
    <h1 ><?= Html::encode($this->title) ?></h1>
    <p class="b-i-btn">

        <?=Html::a('Create Blog', ['create'], ['class' => ' t_btn', 'style' => 'margin-bottom: 30%'])?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>
            $gridColumns,

    ]);?>
    <h1><?= Html::encode($this->title) ?></h1>



</div>
