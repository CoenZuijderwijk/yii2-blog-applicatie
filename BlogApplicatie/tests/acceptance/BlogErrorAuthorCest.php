<?php

class BlogErrorAuthorCest
{
    public function _before(AcceptanceTester $I)
    {
    }



    public function authorLogin(AcceptanceTester $I) {
        $I->loginAuthor($I);
    }


    public function blogErrorAuthor(AcceptanceTester $I) {

        $I->amOnPage('/blog');
        $I->waitForText("Create Blog", 25);
        $I->amOnPage("/blog/update?id=3");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/blog/delete?id=3");
        $I->waitForText("(#405)", 25);

        $I->amOnPage("/comment");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/comment/view?id=13");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/comment/update?id=13");
        $I->waitForText("(#404)", 25);

        $I->amOnPage("/comment/delete?id=13");
        $I->waitForText("(#403)", 25);

    }

    public function authorLogout(AcceptanceTester $I) {
        $I->logout($I);
    }

}
