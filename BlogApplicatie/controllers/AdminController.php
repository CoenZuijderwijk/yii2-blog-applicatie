<?php
namespace app\controllers;

use app\components\WebUser;
use yii\web\Controller;
use app\models\user;
use Yii;

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

            return $this->render("Home", [
                "name" => $name,
            ]);
        } else {
            echo "access denied" ;

            return $this->render('error', [
                "name" => $name,
            ]);
        }
        //die(var_dump($this->accessRules()));


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
}


?>
