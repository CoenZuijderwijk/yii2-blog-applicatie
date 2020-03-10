<?php

namespace app\controllers;

use app\components\WebUser;
use app\models\Comment;
use Codeception\PHPUnit\Constraint\Page;
use Yii;
use app\models\Blog;
use app\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    //action to run the blog index page
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $models = Blog::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    //action to run the page to view a blog individual
    public function actionView($id)
    {
        $model = Blog::findOne($id);

        $model2 = new Comment();
        $comments = Comment::find()
            ->where(['blog_id' => $model->id])->all();

            return $this->render('view', [
            'model' => $model,
            'model2' => $model2,
            'comments' => $comments,
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    //action to run the page to create a blog
    public function actionCreate()
    {

        $model = new Blog();

        $user = WebUser::findOne(Yii::$app->getUser()->id);

        $date = date('Y-m-d H:i:s');

        if(!$user) {
            return $this->redirect('error');
        } elseif($user->getAccessLevel() >= 16) {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if(UploadedFile::getInstance($model, 'file' !== NULL)) {
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $imageName = $model->file->getBaseName() . random_int(1, 100);
                    $model->attachment = 'uploads/' . $imageName . '.' . $model->file->extension;
                    $save = $model->attachment;

                    $model->file->saveAs($save);
                }

                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('create', [
                'model' => $model,
                'user' => $user,
                'date' => $date
            ]);
        } else {
            return $this->render('error');
        }



    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    //action to run the page to update a blog
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $user = WebUser::findOne(Yii::$app->getUser()->id);
        $date = date('Y-m-d H:i:s');

        if (!$user) {
            return $this->redirect('error');
        } elseif ($user->getAccessLevel() >= 98) {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if (UploadedFile::getInstance($model, 'file' !== NULL)) {
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $imageName = $model->file->getBaseName() . random_int(1, 100);
                    $model->attachment = 'uploads/' . $imageName . '.' . $model->file->extension;
                    $save = $model->attachment;

                    $model->file->saveAs($save);
                }

                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);

            }
            return $this->render('update', [
                'model' => $model,
                'user' => $user,
                'date' => $date
            ]);
        }   elseif ($user->getAccessLevel() >= 16) {
                if ($model->author_id == $user->id) {

                    if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        if (UploadedFile::getInstance($model, 'file' !== NULL)) {
                            $model->file = UploadedFile::getInstance($model, 'file');
                            $imageName = $model->file->getBaseName() . random_int(1, 100);
                            $model->attachment = 'uploads/' . $imageName . '.' . $model->file->extension;
                            $save = $model->attachment;

                            $model->file->saveAs($save);
                        }

                        $model->save();

                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                    return $this->render('update', [
                        'model' => $model,
                        'user' => $user,
                        'date' => $date
                    ]);
                } else {
                    return $this->render("error");
                }
            } else {
                return $this->render('error');
            }

        }



    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    //action to run the page to delete a blog
    public function actionDelete($id)
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $models = Blog::find()->all();


        $user = WebUser::findOne(Yii::$app->getUser()->id);
        if(!$user) {
            return $this->redirect('error');
        }elseif($user->accessLevel() >= 98) {
            $this->findModel($id)->delete();
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'models' => $models
            ]);
        } elseif($user->getAccessLevel() >= 16) {
            if($this->findModel($id)->author_id == $user->id) {
                $this->findModel($id)->delete();
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'models' => $models
                ]);
            } else {
                return $this->render("error");
            }

        } else {
            return $this->render('error');
        }


    }


    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    //method to find a model
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDownload($id) {
        $model = Blog::findOne($id);
        $file = $model->attachment;
        if(file_exists($file)) {
            Yii::$app->response->sendFile($file);
        } else {
        return  $this->render('error');
        }

    }
    //action to delete a comment
    public function actionDeleteComment($id) {
        $comment = Comment::findOne($id);
        $comment->delete();


        return $this->redirect('/blog');

    }
}
