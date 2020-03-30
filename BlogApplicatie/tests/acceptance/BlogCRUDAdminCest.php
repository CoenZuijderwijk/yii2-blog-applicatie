<?php 

class BlogCRUDAdminCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function adminLogin(AcceptanceTester $I)
    {
        $I->loginAdmin($I);
    }

    public function indexOverview(AcceptanceTester $I) {
        $I->amOnPage("/");
        $I->see("Blog");
        $I->wait(5);
        $I->click("Blog");
        $I->wait(5);
        $I->waitForText("Create Blog", 25);
        $I->wait(5);
        $I->waitForText("Comment overview", 25);
    }

    public function comment(AcceptanceTester $I) {
        $I->amOnPage("/comment");
        $I->waitForText("php", 25);
        $I->amOnPage("/comment/view?id=46");
        $I->waitForText("php", 25);
        $I->see("Delete");
    }

    public function createBlog(AcceptanceTester $I) {
        $I->amOnPage("/blog");
        $I->waitForText("Create Blog", 25);
        $I->click("Create Blog");
        $I->fillField("#blog-title", "testTitle");
        $I->fillField("#blog-inleiding", "testInleiding");
        $I->wait(10);
        $I->executeJS("tinyMCE.activeEditor.setContent('<span>even testen</span> html');");
        $I->executeJS(" console.log('executed js');");
        $I->executeJS("console.log(tinymce.innerHTML);");
        $I->wait(3);
        $I->click("Save");
        $I->wait(5);
        $I->see("even testen");
        $I->wait(5);
        $I->see("Commentaar toevoegen");
    }

    public function createComment(AcceptanceTester $I) {
        $I->amOnPage("/blog/view?id=7");
        $I->waitForText("Commentaar toevoegen", 25);
        $I->fillField("#comment-title", "gekkeTitle");
        $I->fillField("#comment-slug", "gekkeSlug");
        $I->click("Save");
        $I->wait(2);
        $I->waitForText("gekkeTitle", 10);
    }

    public function editComment(AcceptanceTester $I) {
        $I->amOnPage("/blog/update?id=7");
        $I->waitForText("Title",25);
        $I->fillField("#blog-title", "testTitle");
        $I->click("Save");
        $I->waitForText("testTitle", 25);
        $I->amOnPage("/blog/update?id=7");
        $I->waitForText("Update Blog", 25);
        $I->fillField("#blog-title", "fefeas");
        $I->click("Save");
        $I->wait(3);
        $I->waitForText("fefeas", 25);
        $I->wait(3);
    }

    public function adminLogout(AcceptanceTester $I) {
        $I->logout($I);
    }

}
