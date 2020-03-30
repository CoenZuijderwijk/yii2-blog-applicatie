<?php 

class BlogErrorUserCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function blogEditError(AcceptanceTester $I) {
        $I->amOnPage("/blog/update?id=23");
        $I->waitForText("(#403)", 25);
    }

    public function blogCreateError(AcceptanceTester $I) {
        $I->amOnPage("/blog/create ");
        $I->waitForText("(#403)", 25);
    }

    public function blogDeleteError(AcceptanceTester $I) {
        $I->amOnPage("/blog/delete?id=23");
        $I->waitForText("(#405)", 25);
    }

    public function commentIndexError(AcceptanceTester $I) {
        $I->amOnPage("/comment");
        $I->waitForText("(#403)", 25);
    }

    public function commentViewError(AcceptanceTester $I) {
        $I->amOnPage("/comment/view?id=13");
        $I->waitForText("(#403)", 25);
    }

    public function commentDeleteError(AcceptanceTester $I) {
        $I->amOnPage("/comment/delete?id=13");
        $I->waitForText("(#403)", 25);
    }
}
