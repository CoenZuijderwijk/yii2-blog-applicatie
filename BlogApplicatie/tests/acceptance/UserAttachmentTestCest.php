<?php
namespace app\tests\acceptance;
class UserAttachmentTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function seeAttachment(AcceptanceTester $I)
    {
        $I->amOnPage("/blog");
        $I->waitForText("Blogs", 25);
        $I->waitForText("cc", 25);
        $I->click("cc");
        $I->waitForText("March 6", 25);
        $I->waitForText("Attachment", 25);
    }
}
