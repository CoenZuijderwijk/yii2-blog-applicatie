<?php
namespace app\controllers;

use app\components\WebUser;
use app\models\Blog;
use app\models\BlogSearch;
use yii\web\Controller;
use app\models\user;
use Yii;
use yii\web\NotFoundHttpException;

class AdminController extends Controller
{

    function accessRules()
    {
        return array(
            //only accessable by admins
            array('allow',
                'expression' => '$user->isAdmin',
                //the 'user' var in an accessRule expression is a reference to Yii::app()->user
            ),
            //deny all other users
            array('deny',
                'users' => array('*')
            ),
        );
    }

    public function actionHome()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $id = Yii::$app->user->getId();
        $user = WebUser::findOne($id);

      // die(var_dump($user));
        if ($user === null) {
            $name = "geust";
        } else {
            $name = $user->getUsername();
        }

        if(!$user){
            echo "access denied";

            return $this->render('error', [
                "name" => $name,
            ]);
        } elseif($user->isAdmin || $user->isSuperAdmin) {
            echo "access granted";

            $user = User::findIdentity(\Yii::$app->getUser()->id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            echo "access denied" ;

            return $this->render('error', [
                "name" => $name,
            ]);
        }
        //die(var_dump($this->accessRules()));
    }

    public function actionBlog() {
        $blog = Blog::findOne(2);
        die(var_dump($blog->author));
    }

    public function actionAddUser()
    {
        $user = new User();
        $user->username = "jan";
        $password = \Yii::$app->getSecurity()->generatePasswordHash("password");
        $user->password = $password;
        $user->accessToken = "hekkermen";
        $user->authKey = "hakkerman";
        $user->save();

        $user2 = new User();
        $user2->username = "piet";
        $password = \Yii::$app->getSecurity()->generatePasswordHash("password");
        $user2->password = $password;
        $user2->accessToken = "Wisselen";
        $user2->authKey = "calve";
        $user2->save();


        echo "<br>===============<br>";
        var_dump($user);
        echo "<br>===============<br>";
        var_dump($user2);

    }

    public function actionAdminTest()
    {
        $user = WebUser::findOne(12);
        die(var_dump($user->getAccessLevel()));
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();
        $user = WebUser::findOne(Yii::$app->getUser()->id);
        $a_id = $user->getId();
        $date = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
            'date' => $date,
        ]);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = WebUser::findOne(Yii::$app->getUser()->id);
        $a_id = $user->getId();
        $date = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
            'date' => $date,
        ]);
    }

    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}


?>
