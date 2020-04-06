<?php

class BlogErrorUserCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function blogErrorUser(AcceptanceTester $I) {
        $I->amOnPage("/blog/update?id=23");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/blog/create ");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/blog/delete?id=23");
        $I->waitForText("(#405)", 25);

        $I->amOnPage("/comment");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/comment/view?id=13");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/comment/delete?id=13");
        $I->waitForText("(#403)", 25);


    }
}
