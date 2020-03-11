<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap" style="background-color: #FFFFFF; color: #002C4F">
    <?php
    $id = Yii::$app->user->id;
    $user = \app\components\WebUser::findOne($id);

    NavBar::begin([
        'brandLabel' => 'Telefication',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar  t_nav',
            'style' => 'background-color: #white;',
        ],
    ]);
    echo Nav::widget([
        'options' => [
                'class' => 'navbar-nav navbar-right'
                ],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Blog', 'url' => ['/blog/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li style="color:#EB9200;">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout t_nav']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
     echo Html::img('@web/img/header-content.jpg', ['style' => 'width:100%']);
    NavBar::end();

    ?>
    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left" style="color: #002C4F  ">&copy; telefication <?= date('Y') ?></p>

        <p class="pull-right" style="color: #EB9200;">Badbit</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
