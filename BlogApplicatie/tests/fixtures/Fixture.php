<?php
    namespace app\tests\fixtures;
    use app\components\WebUser;
    use yii\test\ActiveFixture;
    class Fixture extends ActiveFixture {
        public function createUser() {
            $m = new WebUser();
            $m->username = "henk";
            $m->password = "password";
            $m->authKey = "gekke";
            $m->accessToken = "henkie";
            $m->accessLevel = 16;
            $m->save();

            $v = new WebUser();
            $v->username = "annie";
            $v->password = "password";
            $v->authKey = "gekke";
            $v->accessToken = "henkie";
            $v->accessLevel = 99;
            $v->save();
        }
    }
