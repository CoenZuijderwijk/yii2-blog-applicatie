<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->see("Login");
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
$I->see("Create Blog");
//we start by checking the comments
$I->see("Comment overview");
//going to the comment overview page
$I->click("Comment overview");
$I->wait(1);
//checking to see a certain comment with "jatoch php"
$I->see("php");
//going to the view page of the comment
$I->amOnPage("/comment/view?id=46");
$I->see("php");
//going to delete the comment
$I->see("Delete");
//going back to blog overview
$I->amOnPage("/blog");
$I->see("Create Blog");
//we are gonna create a blog
$I->click("Create Blog");
//filling in the blog
$I->fillField("#blog-title", "testTitle");
$I->fillField("#blog-inleiding", "testInleiding");
$I->wait(2);
$I->see('Create Blog');
$I->see('File');
$I->see("Edit");
$I->see("Save");
$I->wait(1);
$I->executeJS("tinyMCE.activeEditor.setContent('<span>even testen</span> html');");
$I->executeJS(" console.log('executed js');");
$I->executeJS("console.log(tinymce.innerHTML);");
$I->wait(10);
$I->click("Save");
$I->wait(3);
$I->see("Commentaar toevoegen");
$I->waitForText("even testen", 15 );
$I->amOnPage("/blog/view?id=7");
//adding a comment
$I->see("Commentaar toevoegen");
$I->fillField("#comment-title", "gekkeTitle");
$I->fillField("#comment-slug", "gekkeSlug");
$I->click("Save");
//checking to see if we see our comment
$I->wait(2);
$I->see("gekkeTitle");

//we can also delete comments because we are admins.
//we are going back to update a blogpost.
$I->amOnPage("/blog/update?id=7");
$I->wait(2);
$I->see("fefeas");
$I->see('Update Blog');
$I->see('File');
$I->see("Edit");
$I->see("Save");


