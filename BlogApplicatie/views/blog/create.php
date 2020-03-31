<?php



namespace app\views\blog;

use yii\helpers\Html;
use yii\web\AssetManager;
/**
 * View to create a blog
 * @package app\view
 */
/* @var $this yii\web\View */
/* @var $model app\models\Blog */


$this->title = 'Create Blog';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,

    ]) ?>

</div>
