<?php

class BlogDeleteAuthorCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->beforeTest();
    }

    public function blogDelte(AcceptanceTester $I)
    {
        $I->loginAuthor($I);

        $I->amOnPage("/blog/view?id=56");
        $I->waitForText("Delete", 25);
        $I->click("Delete");
        $I->waitForText("Blogs", 25);
        $I->wait(1);
        $I->dontSee("56");

        $I->logout($I);


    }

    public function _after(AcceptanceTester $I)
    {
        $I->afterTest();
    }


}
