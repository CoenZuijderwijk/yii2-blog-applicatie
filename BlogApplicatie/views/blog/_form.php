<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(['options' => ['encypte' => 'multipart/form-date']]); ?>
    <?= $form->field($model, 'author_id')->hiddenInput(['value' => $user->getId(),])->label(false) ?>

    <?= $form->field($model, 'publish_date')->hiddenInput(['value' => $date,])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'inleiding')->textInput(['maxlength' => true]) ?>
       <div class="form-group">

       </div>
    <?= $form->field($model, 'slug')->textarea(['rows' => 12])->widget(TinyMce::className(), [
        'options' => ['rows' => 18],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
        ]
    ]); ?>

    <?= $form->field($model, 'file')->fileInput( [
            'maxSize' => 10240000000
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>





