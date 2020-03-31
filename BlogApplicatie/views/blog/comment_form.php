<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\Blog */

/**
 * view for the comment form
 */
$form = ActiveForm::begin(['options' => ['encypte' => 'multipart/form-date']]);
?>

    <?= $form->field($model, "title")->textInput(['maxLength' => 120]) ?>
    <?= $form->field($model, "blog_id")->hiddenInput(['value' => $model->id])->label(false) ?>
    <?= $form->field($model, "publish_date")->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false) ?>
    <?= $form->field($model, "slug")->textarea(['rows' => 3]) ?>
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
