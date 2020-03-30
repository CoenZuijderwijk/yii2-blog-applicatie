<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/

use \Codeception\Events;

class AcceptanceTester extends \Codeception\Actor
{
    public static $events = array(
        Events::SUITE_AFTER  => 'afterSuite',
        Events::TEST_BEFORE => 'beforeTest',
        Events::STEP_BEFORE => 'beforeStep',
        Events::TEST_FAIL => 'testFailed',
        Events::RESULT_PRINT_AFTER => 'print',
        Events::TEST_AFTER => 'afterTest',
    );

    use _generated\AcceptanceTesterActions;

    public function afterTest(\Codeception\Event\TestEvent $e) {
        exec("CD C:\xampp\mysql\bin & mysqldump -u root blogapplicatie < ../../htdocs/Yii/yii2-blog-applicatie/BlogApplicatie/tests/_data/before-test.sql");
    }

    public function loginAdmin($I) {
        $username = '#loginform-username';
        $password = '#loginform-password';
        $I->amOnPage("/site/login");
        $I->waitForText("Username", 50);
        //filling in the login form
        $I->fillField($username, 'coen');
        $I->wait(1);
        $I->fillField($password, 'coen');
        $I->click("Login!");
        //checking if we succeed to login and got send back to the homepage
        $I->waitForText("Congratulations!", 50);
    }

    public function loginAuthor($I) {
        $username = '#loginform-username';
        $password = '#loginform-password';
        $I->amOnPage("/site/login");
        $I->waitForText("Username", 50);
        //filling in the login form
        $I->fillField($username, 'piet');
        $I->wait(1);
        $I->fillField($password, 'password');
        $I->click("Login!");
        //checking if we succeed to login and got send back to the homepage
        $I->waitForText("Congratulations!", 50);
    }

    public function logout($I) {
        $I->amOnPage("/");
        $I->waitForText("Logout", 50);
        $I->click("Logout");
        $I->waitForText("Congratulations!", 50);
        $I->wait(5);
        $I->dontsee("Logout");
        $I->wait(5);
    }

   /**
    * Define custom actions here
    */
}
