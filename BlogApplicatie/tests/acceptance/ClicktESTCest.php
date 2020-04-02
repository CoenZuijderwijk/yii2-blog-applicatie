<?php 

class ClicktESTCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage("/");
        $I->waitForText("Blog", 25);
        $I->click("Blog");
        $I->waitForText("piet", 25);
        $I->click("piet");
        $I->waitForText("Attachment smile", 25);

    }
}
