<?php

class AttachmentCRUDCest
{
    public function beforeTest(AcceptanceTester $I) {
        $I->beforeTest();
    }

    public function adminLogin(AcceptanceTester $I)
    {
        $I->loginAdmin($I);
    }

    public function uploadAttachment(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=7");
        $I->waitForText("Attachment toevoegen", 25);
        $I->click("Attachment toevoegen");
        $I->waitForText("files", 25);
        $I->wait(2);
        $I->see("Browse");
        $I->executeJS("document.getElementById('input-bla').style.opacity = 100;");
        $I->attachFile('input[id="input-bla"]', 'price.jpg');
        $I->waitForText("Upload", 25);
        $I->click("Upload");
        $I->see("Terug");
        $I->wait(5);
        $I->click("Terug");
        $I->wait(5);
    }

    public function deleteAttachment(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=7");
        $I->see("Attachment price verwijderen");
        $I->wait(5);
        $I->click("Attachment price verwijderen");
        $I->waitForText("Attachment toevoegen", 25);
    }

    public function logout(AcceptanceTester $I) {
        $I->logout($I);
    }

    public function afterTest(AcceptanceTester $I)
    {
        $I->afterTest();
    }

}
