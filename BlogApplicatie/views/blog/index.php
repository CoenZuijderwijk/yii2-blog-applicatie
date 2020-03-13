<?php

use app\models\User;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;


if(!Yii::$app->getUser()->isGuest){

    $user = User::findOne(Yii::$app->getUser()->getId());
    if($user->getAccessLevel() >= 40) {
        echo $this->render('indexAdmin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models,]);

    } else {
       echo $this->render('indexAuthor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models,]);
    }
} else {
   echo $this->render('indexGeust', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'models' => $models,]);
}

?>

