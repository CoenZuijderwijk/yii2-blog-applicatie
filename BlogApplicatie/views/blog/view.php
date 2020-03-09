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





?>
<div class="blog-view">


    <div class="row">
        <div class="col-12" style="background-color: #f2f2f2; padding: 2%">
                <div>
                <?php
                 echo Html::a('Attachment', Url::to("blog/download?id=" . $model->id, $model->id), ['style' => 'color: #337ab7;']);
                ?>
                </div>


            <?= "<h3 style='color:#EB9200'>" . $model->title . "</h3>"?>
            <?= "<p style='color:$002C4F'>" . $model->slug . "</p>"?>

        </div>
    </div>
    <div class="row">
        <?php
        foreach($comments as $comm) {
            echo "<div class='col-12'>";
            echo "<h4>" . $comm->title . "</h4>";
            echo "<p>" . $comm->slug . "</p>";
            echo "<div style='float:right'>" . $comm->publish_date . "</div>" ;
            if(!Yii::$app->getUser()->isGuest) {
                $user = User::findOne(Yii::$app->getUser()->getId());
                if($user->getAccessLevel() >= 98) {
                    echo "<button class='btn'>" .  Html::a('Delete', Url::to("/comment/delete?id=" . $comm->id), ['style' => 'color: #337ab7;']) ."</button>";
                }
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
