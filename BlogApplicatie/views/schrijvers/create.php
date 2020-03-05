<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\components\WebUser */

$this->title = 'Create Web User';
$this->params['breadcrumbs'][] = ['label' => 'Web Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
