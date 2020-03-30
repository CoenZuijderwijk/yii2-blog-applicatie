<?php 

class BlogCruAuthorCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function authorLogin(AcceptanceTester $I)
    {
        $I->loginAuthor($I);
    }

    public function createBlog(AcceptanceTester $I) {
       $I->amOnPage("/blog");
       $I->waitForText("Blogs", 25);
       $I->wait(2);
        $I->click("Create Blog");
        $I->wait(2);
        $I->waitForText("Title", 25);
        $I->fillField('input[id="blog-title"]', 'testTitle');
        $I->wait(1);
        $I->fillField('input[id="blog-inleiding"]', 'testInleiding');
        $I->wait(10);
        $I->executeJS("tinyMCE.activeEditor.setContent('<span>even testen</span> html');");
        $I->executeJS(" console.log('executed js');");
        $I->executeJS("console.log(tinymce.innerHTML);");
        $I->wait(3);
        $I->click("Save");
        $I->waitForText("testTitle", 25);
        $I->wait(2);
        $I->waitForText("Delete", 25);
    }

    public function editBlog(AcceptanceTester $I) {
        $I->amOnPage("/blog/update?id=46");
        $I->wait(2);
        $I->fillField("#blog-title" , "twee");
        $I->wait(2);
        $I->click("Save");
        $I->wait(2);
        $I->waitForText("twee", 25);
        $I->wait(2);
    }

    public function authorLogout(AcceptanceTester $I) {
        $I->logout($I);
    }
}
