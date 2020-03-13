<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(187));
        expect($user->username)->equals('Coen');

        expect_not(User::findIdentity(999));
    }



    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('piet'));
        expect_not(User::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('coen');
        expect_that($user->validateAuthKey('coen'));
        expect_not($user->validateAuthKey('piet'));

        expect_not($user->validatePassword('123456'));        
    }

}
