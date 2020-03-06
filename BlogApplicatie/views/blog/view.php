<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'Blog: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['blog/']];

\yii\web\YiiAsset::register($this);

?>
<div class="blog-view">


    <div class="row">
        <div class="col-12" style="background-color: #f2f2f2; padding: 2%">
            <?= "<h3 style='color:#EB9200'>" . $model->title . "</h3>"?>
            <?= "<p style='color:$002C4F'>" . $model->slug . "</p>"?>

        </div>
    </div>

</div>
