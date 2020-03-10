<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(['action' => ['comment/create']
    ,'id' => "comment-form"]); ?>

    <?= $form->field($model, 'blog_id')->hiddenInput(['value' => $id])->label(false) ?>

    <?= $form->field($model, 'publish_date')->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
