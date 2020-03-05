<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\components\WebUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schrijvers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Schrijver toevoegen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',

            'accessLevel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
