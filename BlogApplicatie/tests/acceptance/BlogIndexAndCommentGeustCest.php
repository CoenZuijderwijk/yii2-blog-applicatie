<?php 

class BlogIndexAndCommentGeustCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function seeBlog(AcceptanceTester $I)
    {
        $I->amOnPage("/");
        $I->waitForText("Blog", 25);
        $I->click("Blog");
        $I->waitForText("piet", 25);
    }

    public function createComment(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=3");
        $I->executeJS('window.scrollTo(0,450);');
        $I->wait(2);
        $I->fillField('input[id="comment-title"]', 'testTitle');
        $I->wait(2);
        $I->fillField('#comment-slug', 'testSlug');
        $I->wait(5);
        $I->click("Save");
        $I->wait(2);
        $I->waitForText("testTitle", 25);
    }
}
