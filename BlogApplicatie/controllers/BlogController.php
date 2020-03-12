<?php

namespace app\controllers;

use app\components\WebUser;
use app\models\Comment;
use app\models\User;
use Codeception\PHPUnit\Constraint\Page;
use PHPUnit\Framework\StaticAnalysis\HappyPath\AssertNotInstanceOf\B;
use Yii;
use app\models\Blog;
use app\models\BlogSearch;
use yii\data\Pagination;
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
        //de dataprovider is om de search requests te handelen en de verzameling van models is voor als je de pagina opent zonder zoekopdrachten
        $models = Blog::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models,
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

        // model2 word aangemaakt voor als er een nieuwe comment word toegevoegd
        //comments zijn alle comments onder een bepaalde blogpost
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
     * @throws \yii\web\UnauthorizedHttpException
     */
    //action to run the page to create a blog
    public function actionCreate()
    {
        $model = new Blog();
        $user = User::findOne(Yii::$app->getUser()->id);

        switch ($this->checkAuth()) {
            //1 means that the user is a admin or super admin
            case 1:

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $this->createBlog($model);
                }

                return $this->render('create' , [
                    'model' => $model,
                    'user' => $user,
                ]);
                break;
                //2 means that the user is an author
            case 2:
                if ($model->author_id == $user->id) {

                    if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        $this->createBlog($model);
                    }

                    return $this->render('create' , [
                        'model' => $model,
                        'user' => $user,
                    ]);
                } else {
                    throw new \yii\web\HttpException(403);
                }
                break;
                //0 means that the user is neither a geust or author.
            case 0: {
                throw new \yii\web\HttpException(403);
                break;
            }
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
        $user = User::findOne(Yii::$app->getUser()->id);


        switch ($this->checkAuth()) {
            //1 means that the user is a admin or super admin
            case 1:

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $this->updateBlog($id);
                }

                return $this->render('update' , [
                    'model' => $model,
                    'user' => $user,
                ]);
                break;
            //2 means that the user is an author
            case 2:
                if ($model->author_id == $user->id) {
                    if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        $this->updateBlog($id);
                    }

                    return $this->render('update' , [
                        'model' => $model,
                        'user' => $user,
                    ]);
                } else {
                    throw new \yii\web\HttpException(403);
                }
                break;
            //0 means that the user is neither a geust or author.
            case 0: {
                throw new \yii\web\HttpException(403);
                break;
            }

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
        $user = User::findOne(Yii::$app->getUser()->id);

            switch ($this->checkAuth()) {
                //1 means that the user is a admin or super admin
                case 1:
                    $this->findModel($id)->delete();
                    return $this->redirect('/blog/index');
                //2 means that the user is an author
                case 2:
                    if ($this->findModel($id)->author_id == $user->id) {
                        $this->findModel($id)->delete();
                        return $this->redirect('/blog/index');
                    } else {
                        throw new \yii\web\HttpException(403);
                            }
                //0 means that the user is neither a geust or author.
                case 0: {
                    throw new \yii\web\HttpException(403);
                    break;
                }
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
                    // MW: Wat vergelijk je nu precies in deze if, klopt dat wel (maw: wordt dit ooit wel eens null)?
                    // CZ: Deze vergelijking kijkt of het model bestaat als je hem bijv wilt verwijderen. Dus als je een blog wilt verwijderen met een id wat niet bestaat throwt hij een exception
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //action to download the attachment
    public function actionDownload($id)
    {
        $model = Blog::findOne($id);
        $file = $model->attachment;
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        } else {
            throw new \yii\web\HttpException(403);
        }
    }
    //action to delete a comment
    public function actionDeleteComment($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('/blog');
    }

    public function getAuth()
    {
        $user = User::findOne(Yii::$app->getUser()->id);
        if (!$user) {
            return 1;
        } elseif ($user->getAccessLevel() >= 98) {
            return 2;
        } elseif ($user->getAccessLevel() >= 16) {
            return 3;
        } else {
            return 1;
        }
    }
    // MW: Dit (en getAuth()) zijn meer zaken die naar het Blog-model kunnen, toch?
    // CZ: naar mijn idee niet. Ze zouden wel naar het user-model kunnen, maar met get en check auth vraag je op of user de rechten heeft om iets uit te voeren of niet.
    public function checkAuth()
    {
        switch ($this->getAuth()) {
            case 1:
                throw new \yii\web\HttpException(403);
                break;
                case 2:
                    return 1;
                    break;
                    case 3:
                        return 2;
                        break;
        }
    }
    //saves the attachment
    public function updateBlog($id)
    {
        $model = $this->findModel($id);

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
        //saves the attachment
    public function createBlog($model) {

        if (UploadedFile::getInstance($model, 'file') !== NULL) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $imageName = $model->file->getBaseName() . random_int(1, 100);
            $model->attachment = 'uploads/' . $imageName . '.' . $model->file->extension;
            $save = $model->attachment;

            $model->file->saveAs($save);
        }

        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);

    }

        }
