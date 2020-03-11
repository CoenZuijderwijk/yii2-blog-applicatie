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



?>
<div class="blog-view">


    <div class="row">
        <div class="col-12 article" style=" padding: 2%; margin-bottom: 10%;">



            <?= "<h3 style='color:#EB9200'>" . $model->title . "</h3>"?>
            <?= "<div class='article_border'></div>" ?>
            <?= "<p style='color:lightgrey'>" . $formatter->asDatetime($model->publish_date, 'long') . "</p>" ?>
            <?= "<div style='color:#002C4F' class='slug'>" . $model->slug . "</div>"?>

            <div style="margin-top: 3%;">
                <?php
                if($model->attachment){
                    echo Html::a('Attachment', Url::to("blog/download?id=" . $model->id, $model->id), ['style' => 'color: #337ab7;']);
                }

                ?>
            </div>

        </div>
    </div>
    <div class="row">
        <?php
        foreach($comments as $comm) {
            echo "<div class='comment col-12 ' style='padding: 2%; margin:1%; '>";
            echo "<h4>" . $comm->title . "</h4>";
            echo "<p>" . $comm->slug . "</p>";
            echo "<div style='float:right'>" . $formatter->asDatetime($comm->publish_date, 'long') . "</div>" ;
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
