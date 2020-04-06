<?php

class AttachmentCRUDCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->beforeTest();
    }

    // tests
    public function AttachmentCRUD(AcceptanceTester $I)
    {
        $I->loginAdmin($I);

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
        $I->click("Terug");

        $I->amOnPage("/blog/view?id=7");
        $I->see("Attachment price verwijderen");
        $I->wait(5);
        $I->click("Attachment price verwijderen");
        $I->waitForText("Attachment toevoegen", 25);

        $I->logout($I);

    }

    public function _after(AcceptanceTester $I)
    {
        $I->afterTest();
    }

}
