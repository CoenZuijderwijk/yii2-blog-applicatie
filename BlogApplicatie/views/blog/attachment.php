<?php
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="attachment-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
    <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true, 'id' => 'input-bla'],
        'pluginOptions' => ['previewFileType' => 'any', 'showUpload' => true]
    ]);
    ?>
</div>

<?= $form->field($model, 'blog_id')->hiddenInput(['value' => 3])->label(false)?>


<div class="form-group">


    <?= Html::submitButton('Save', ['class' => 'btn btn-success js_button']) ?>
</div>

<?php ActiveForm::end(); ?>
