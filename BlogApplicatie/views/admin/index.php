<?php

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
    ]
];
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,


    ]); ?>


</div>
