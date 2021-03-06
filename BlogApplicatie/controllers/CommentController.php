<?php

namespace app\controllers;


use app\models\User;
use Codeception\PHPUnit\Constraint\Page;
use Yii;
use app\models\Comment;
use app\models\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Class CommentController
 * @package app\controllers
 */
class CommentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $user = User::findOne(Yii::$app->getUser()->id);

        if(!$user){
            throw new \yii\web\HttpException(403);
        }  elseif($user->getAccessLevel() >= 98) {

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        } else {
            throw new \yii\web\HttpException(403);
        }


    }

    /**
     * Displays a single Comment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user = User::findOne(Yii::$app->getUser()->id);

        if(!$user){
            throw new \yii\web\HttpException(403);
        }  elseif($user->getAccessLevel() >= 98) {

            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);

        } else {
            throw new \yii\web\HttpException(403);
        }
    }

    /**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['blog/view', 'id' => $model->blog_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Comment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $user = User::findOne(Yii::$app->getUser()->id);

        if(!$user){
            throw new \yii\web\HttpException(403);
        }  elseif($user->getAccessLevel() >= 98) {
                $model =  $this->findModel($id);
                $model->delete();

            return $this->redirect("/comment/index");

        } else {
            throw new \yii\web\HttpException(403);
        }
    }

    /**
     * Finds the Comment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
