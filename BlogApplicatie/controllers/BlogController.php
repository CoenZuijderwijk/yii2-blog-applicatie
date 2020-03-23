<?php

namespace app\controllers;

use app\models\Attachment;
use app\models\Comment;
use app\models\CommentSearch;
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
use yii\base\Security;

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

        $attachments = Attachment::find()->where(['blog_id' => $id])->all();

        return $this->render('view', [
            'model' => $model,
            'model2' => $model2,
            'comments' => $comments,
            'attachments' => $attachments,
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
                    $this->redirect('/blog/view?id=' . $model->id);
                }

                return $this->render('create' , [
                    'model' => $model,
                    'user' => $user,
                ]);
                break;
                //2 means that the user is an author
            case 2:
                    if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        $this->redirect('/blog/view?id=' . $model->id);
                    }

                    return $this->render('create' , [
                        'model' => $model,
                        'user' => $user,
                    ]);

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
                    $this->redirect('/blog/view?id=' . $model->id);
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
                        $this->redirect('/blog/view?id=' . $model->id);
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
//the attachment action
    public function actionAttachment($id)
    {
        $model = new Attachment();
        $blog = Blog::findOne($id);
        $user = User::findOne(Yii::$app->getUser()->id);

        switch ($this->checkAuth()) {
            //1 means that the user is a admin or super admin
            case 1:

                return $this->render('attachment', [
                    'model' => $model,
                    'id' => $id,
                ]);
                break;
            //2 means that the user is an author
            case 2:
                if ($blog->author_id == $user->id) {
                    return $this->render('attachment', [
                        'model' => $model,
                        'id' => $id,
                    ]);
                } else {
                    throw new \yii\web\HttpException(403);
                }
                break;
            //0 means that the user is neither a geust or author.
            case 0:
            {
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
        $blog = Blog::findOne($id);

            switch ($this->checkAuth()) {

                //1 means that the user is a admin or super admin
                case 1:
                    $blog->delete();
                    return $this->redirect('/blog/index');
                //2 means that the user is an author
                case 2:
                    if ($this->findModel($id)->author_id == $user->id) {
                        $blog->delete();
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
        $model = Attachment::findOne($id);
        $file = $model->file_full_name;
            Yii::$app->response->sendFile('uploads/' . $file);
    }
    //action to delete a comment
    public function actionDeleteComment($id)
    {
        $comment = Comment::findone($id);
        $comment->delete();

        return $this->redirect('/blog');
    }


    //action to delete an attachment
    public function actionDeleteAttachment($id) {

        $attachment = Attachment::findOne($id);
        $b_id = $attachment->blog_id;
        $attachment->delete();
        return $this->redirect('/blog/view?id=' . $b_id);
    }
        //action to handle an attachment
    public function actionHandleAttachment($id) {
        $this->handleAttachment($id);
    }
//method to handle an attachment
    public function handleAttachment($id) {
        $model = new Attachment();
        if ( Yii::$app->request->post() ) {
            $model->load( Yii::$app->request->post() );
            $files = UploadedFile::getInstances($model, 'files');
            foreach($files as $file) {
                $attachment = new Attachment();
                $attachment->file_extension = $file->extension;
                $attachment->file_name = $file->getBaseName() . $attachment->blog_id;
                $attachment->file_full_name = $attachment->file_name . "." . $attachment->file_extension;
                $attachment->blog_id = $id;
                $save = $attachment->file_full_name;
                $file->saveAs('uploads/' . $save);
                $attachment->files = "";
                $attachment->save();
                $this->redirect('/blog/index');
            }


        }

    }

    //method to authenticate
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
    //method to return an authentication
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
 }
