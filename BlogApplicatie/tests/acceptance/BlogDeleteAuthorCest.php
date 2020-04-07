<?php

class BlogDeleteAuthorCest
{
    public function beforeTest(AcceptanceTester $I)
    {
        $I->beforeTest();
    }


    public function authorLogin(AcceptanceTester $I)
    {
        $I->loginAuthor($I);
    }

    public function deleteBlog(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=56");
        $I->waitForText("Delete", 25);
        $I->click("Delete");
        $I->waitForText("Blogs", 25);
        $I->wait(1);
        $I->dontSee("56");
    }

    public function logout(AcceptanceTester $I) {
        $I->logout($I);
    }

    public function afterTest(AcceptanceTester $I)
    {
        $I->afterTest();
    }


}
