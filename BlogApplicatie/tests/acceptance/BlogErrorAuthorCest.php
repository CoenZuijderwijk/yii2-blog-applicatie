<?php 

class BlogErrorAuthorCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function authorLogin(AcceptanceTester $I) {
        $I->loginAuthor($I);
    }

    public function blogUpdateError(AcceptanceTester $I){
        $I->amOnPage('/blog');
        $I->waitForText("Create Blog", 25);
        $I->amOnPage("/blog/update?id=3");
        $I->waitForText("(#403)", 25);
    }

    public function blogDeleteError(AcceptanceTester $I) {
        $I->amOnPage("/blog/delete?id=3");
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

    public function commentEditError(AcceptanceTester $I) {
        $I->amOnPage("/comment/update?id=13");
        $I->waitForText("(#404)", 25);
    }

    public function commentDeleteError(AcceptanceTester $I) {
        $I->amOnPage("/comment/delete?id=13");
        $I->waitForText("(#403)", 25);
    }

    public function logout(AcceptanceTester $I) {
        $I->logout($I);
    }
}
