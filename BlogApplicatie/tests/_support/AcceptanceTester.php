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

   /**
    * Define custom actions here
    */
}
