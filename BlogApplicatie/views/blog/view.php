<?php

use app\models\Comment;
use app\models\User;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $comment app\models\Comment */

$this->title = 'Blog: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['blog/']];

\yii\web\YiiAsset::register($this);
$comment = new Comment();
$blog_id = $model->id;
$formatter = \Yii::$app->formatter;
$user = User::findOne(Yii::$app->getUser()->id);




?>
<div class="blog-view">


    <div class="row">
        <div class="col-12 article">


            <?php
                if($user === NULL) {

                } elseif($user->getAccessLevel() >= 98) {
                    echo Html::a('Attachment toevoegen', ['blog/attachment?id=' . $blog_id,], ['class' => 't_btn']);
                } elseif($user->getAccessLevel() >= 16 && $model->author_id == $user->getId()) {
                    echo Html::a('Attachment toevoegen', ['blog/attachment?id=' . $blog_id], ['class' => 't_btn']);
                }
            ?>


            <h3 class="title"><?= $model->title?> </h3>
            <div class='article_border'></div>
           <p style='color:lightgrey'><?=$formatter->asDatetime($model->publish_date, 'long') ?></p>
            <div  class='slug'><?=$model->slug ?> </div>

            <div class="attachment">

                <?php
                if($user === NULL) {
                    foreach ($attachments as $attachment) {
                        echo Html::a('Attachment ' . $attachment->file_name, Url::to("blog/download?id=" . $attachment->id, $attachment->id), ['style' => 'color: #337ab7;']) . "<br>";
                    }
                } elseif($user->getAccessLevel() >= 98) {
                    foreach ($attachments as $attachment) {
                        echo Html::a('Attachment ' . $attachment->file_name, Url::to("blog/download?id=" . $attachment->id, $attachment->id), ['style' => 'color: #337ab7; margin-right: 1%;']);
                        echo Html::a('Attachment verwijderen', Url::to("blog/delete-attachment?id=" . $attachment->id, $attachment->id), ['style' => 'color: #337ab7;']) . "<br>";
                    }
                } elseif($user->getAccessLevel() >= 16 && $model->author_id == $user->getId()) {
                    foreach ($attachments as $attachment) {
                        echo Html::a('Attachment ' . $attachment->file_name, Url::to("blog/download?id=" . $attachment->id, $attachment->id), ['style' => 'color: #337ab7; margin-right: 1%;']);
                        echo Html::a('Attachment verwijderen', Url::to("blog/delete-attachment?id=" . $attachment->id, $attachment->id), ['style' => 'color: #337ab7;']) . "<br>";
                    }
                } else {
                    foreach ($attachments as $attachment) {
                        echo Html::a('Attachment' . $attachment->file_name, Url::to("blog/download?id=" . $attachment->id, $attachment->id), ['style' => 'color: #337ab7;']) . "<br>";
                    }
                }


                ?>
            </div>

        </div>
    </div>
    <div class="row">
        <?php
        foreach($comments as $comm) {
            ?>

            <div class='comment col-12 '>
           <h4><?= $comm->title ?></h4>
           <p><?= $comm->slug?></p>
                <div> <?= $formatter->asDatetime($comm->publish_date, 'long') ?></div>
                <?php
            if(!Yii::$app->getUser()->isGuest) {
                $user = User::findOne(Yii::$app->getUser()->getId());

            }
            echo "</div>";
            }
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Commentaar toevoegen</h3>

            <?= $this->render('../comment/_form', [
                'model' => $comment,
                'id' => $blog_id,
            ]) ?>

        </div>
    </div>


</div>
