<?php

class AuthorAdminAttachmentTestCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->beforeTest();
    }


    public function AttachmentTest(AcceptanceTester $I)
    {
        $I->loginAdmin($I);

        $I->amOnPage("/blog/view?id=49");
        $I->waitForText("Attachment toevoegen", 25);
        $I->wait(5);
        $I->click("Attachment toevoegen");
        $I->waitForText("Files", 25);
        $I->wait(5);

        $I->logout($I);

        $I->loginAuthor($I);

        $I->amOnPage("/blog/view?id=3");
        $I->dontSee("Attachment toevoegen");
        $I->wait(5);
        $I->waitForText("Attachment", 25);
        $I->wait(3);
        $I->amOnPage("/blog/view?id=56");
        $I->wait(3);
        $I->waitForText("Attachment toevoegen", 25);
        $I->dontSee("Attachment smile");

        $I->logout($I);


    }

    public function _after(AcceptanceTester $I)
    {
        $I->afterTest();
    }


}
