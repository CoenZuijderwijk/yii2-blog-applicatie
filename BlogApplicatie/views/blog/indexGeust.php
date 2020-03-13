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


?>
<div class="blog-index">
        <h1><?= Html::encode($this->title) ?></h1>


        <?php
        echo "<div class='row'>";
        foreach($models as $model) { ?>
            <div class="col-12 g-blog-in">
                <h3><?= "<a href='/blog/view?id=" . $model->id . "'>" . $model->title . "</a>"?></h3>
                <div class="article_border"></div>
                <p class="p_article"> <?= $model->inleiding ?></p>
            </div>
    <?php } ?>


</div>
