<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->waitForText("Login", 5);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'coen');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'coen');
$I->click("Login!");
$I->wait(2);
//checking if we succeed to login and got send back to the homepage
$I->amOnPage("/blog");
$I->wait(1);
$I->waitForText("Create Blog", 5);
//we start by checking the comments
$I->waitForText("Comment overview", 5);
//going to the comment overview page
$I->click("Comment overview");
$I->wait(1);
//checking to see a certain comment with "jatoch php"
$I->waitForText("php", 5);
//going to the view page of the comment
$I->amOnPage("/comment/view?id=46");
$I->waitForText("php", 5);
//going to delete the comment
$I->see("Delete");
//going back to blog overview
$I->amOnPage("/blog");
$I->waitForText("Create Blog", 5);
//we are gonna create a blog
$I->click("Create Blog");
//filling in the blog
$I->waitForText("Title", 5);
$I->fillField("#blog-title", "testTitle");
$I->fillField("#blog-inleiding", "testInleiding");
$I->wait(2);

$I->wait(1);
$I->executeJS("tinyMCE.activeEditor.setContent('<span>even testen</span> html');");
$I->executeJS(" console.log('executed js');");
$I->waitForText("Save", 5);
$I->click("Save");
$I->waitForText("Commentaar toevoegen", 5);
$I->waitForText("even testen", 15 );
$I->amOnPage("/blog/view?id=7");
//adding a comment
$I->waitForText("Commentaar toevoegen", 5);
$I->fillField("#comment-title", "gekkeTitle");
$I->fillField("#comment-slug", "gekkeSlug");
$I->click("Save");
//checking to see if we see our comment
$I->wait(2);
$I->waitForText("gekkeTitle", 5);

//we can also delete comments because we are admins.
//we are going back to update a blogpost.
$I->amOnPage("/blog/update?id=7");
$I->waitForText("Title",5);

$I->fillField("#blog-title", "testTitle");
$I->click("Save");

//setting all the edited stuff back to what it used to be
$I->amOnPage("/blog/update?id=7");
$I->wait(2);
$I->waitForText("Update Blog", 10);
$I->fillField("#blog-title", "fefeas");
$I->click("Save");
$I->amOnPage("/blog/view?id=7");
$I->waitForText("fefeas", 5);


