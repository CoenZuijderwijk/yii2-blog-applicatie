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

    public function actionHome() {
        $user = WebUser::findOne(Yii::$app->getUser()->id);
        if($user->accessLevel >= 98) {
            $name = $user->username;
            return $this->render("home", [
                'name' => $name
            ]);
        } else {
            throw new \yii\web\HttpException(403);
        }

    }


}


?>
