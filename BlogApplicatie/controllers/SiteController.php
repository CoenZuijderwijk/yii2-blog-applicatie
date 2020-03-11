<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    //action to run the index page for the site
    public function actionIndex()
    {
        $cache = Yii::$app->cache;

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    //action to run the login page
    public function actionLogin()
    {
        // MW: Kun dit aanpassen zodat je hier kunt debuggen zonder cached data?
        $cache = Yii::$app->cache;
        $info = $cache->get("my_cached_data");

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $info = $model->getUser();
            $cache->set("my_cached_data", $info, 60);
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
            'info' => $info
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    //action to run the logout page
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
