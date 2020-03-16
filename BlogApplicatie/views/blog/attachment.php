<?php
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="attachment-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
    <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true, 'id' => 'input-bla'],
        'pluginOptions' => [
                'previewFileType' => 'any',
                'showUpload' => true,
                'uploadUrl' => Url::to(['/blog/handle-attachment?id=' . $id]),
        ]
    ]);
    ?>
</div>

<?= $form->field($model, 'blog_id')->hiddenInput(['value' => 3])->label(false)?>


<div class="form-group">



    <button type="submit" class="btn btn-success js_button">Save</button>
</div>

<?php ActiveForm::end(); ?>

