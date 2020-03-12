<?php
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */

?>
<h1>Test</h1>

<div class="attachment-form">
    <?php $form = ActiveForm::begin(['options' => ['name' => 'attachments', 'enctype' => 'multipart/form-data']]);?>
    <?= $form->field($model, 'blog_id')->hiddenInput(['value'=> 3,])->label(false)?>

</div>

        <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
            'options' => ['multiple' => true, 'id' => 'input-bla'],
            'pluginOptions' => ['previewFileType' => 'any', 'showUpload' => true]
        ]);
        ?>

<button id="gaan">Gaan</button>

<script>


    var button = document.getElementById('gaan');
    button.addEventListener('click',  function() {
        console.log('click');
        $("#input-bla").fileinput({
            uploadUrl: "/blog/handle-attachment"
        })
    });

</script>