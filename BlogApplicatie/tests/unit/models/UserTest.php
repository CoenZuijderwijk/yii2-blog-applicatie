<?php

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testCreateUser()
    {
        $m = new User();
        $m->username = "Henk";
        $m->password= "password";
        $m->authKey = "gekke henkie";
        $m->accessToken= "niet zo gekke henkie";
        $m->accessLevel = 69;
        $this->assertTrue($m->save());
    }

    public function testUpdateUser() {
        $m = new User();
        $m->username = "myuser2";
        $m->password = "wachtwoord";
        $m->authKey = "mu2";
        $m->accessToken= "2um";
        $m->accessLevel = 12;
        $this->assertTrue($m->save());
        $m = User::find()->where(['username' => "myuser2"])->one();
        $m->username = "jantje";
        $this->assertEquals("jantje", $m->username);
    }

    public function testDeleteUser() {
        $m = User::find()->where(['username' => 'piet'])->one();
        $this->assertNotNull($m);
        User::deleteAll(['username' => $m->username]);
        $m = User::findOne(['username' => 'piet']);
        $this->assertNull($m);
    }

}