<?php
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */
/**
 * view for the attachment
 */
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

</div>

<div>
    <?php
    echo Html::a('Terug', ['view?id=' . $id], [
        'class' => 't_btn',
    ]);
    ?>
</div>

<?php ActiveForm::end(); ?>

