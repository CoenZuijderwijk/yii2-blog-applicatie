<?php
namespace app\tests\acceptance;
class AuthorAdminAttachmentTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function AdminLogin(AcceptanceTester $I)
    {
        $I->loginAdmin($I);
    }

    public function attachmentTestAdmin(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=49");
        $I->waitForText("Attachment toevoegen", 25);
        $I->wait(5);
        $I->click("Attachment toevoegen");
        $I->waitForText("Files", 25);
    }

    public function adminLogout(AcceptanceTester $I) {
        $I->logout($I);
    }

    public function authorLogin(AcceptanceTester $I) {
        $I->loginAuthor($I);
    }

    public function attachmentTestAuthor(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=3");
        $I->dontSee("Attachment toevoegen");
        $I->wait(5);
        $I->waitForText("Attachment", 25);
        $I->wait(3);
        $I->amOnPage("/blog/view?id=56");
        $I->wait(3);
        $I->waitForText("Attachment toevoegen", 25);
        $I->dontSee("Attachment smile");
    }

    public function authorLogout(AcceptanceTester $I) {
        $I->logout($I);
    }
}
