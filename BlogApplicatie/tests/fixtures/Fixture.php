<?php
    namespace app\tests\fixtures;
    use app\models\User;
    use yii\test\ActiveFixture;
    class Fixture extends ActiveFixture {
        public function createUser() {
            $m = new User();
            $m->username = "henk";
            $m->password = "password";
            $m->authKey = "gekke";
            $m->accessToken = "henkie";
            $m->accessLevel = 16;
            $m->save();

            $v = new User();
            $v->username = "annie";
            $v->password = "password";
            $v->authKey = "gekke";
            $v->accessToken = "henkie";
            $v->accessLevel = 99;
            $v->save();
        }
    }
