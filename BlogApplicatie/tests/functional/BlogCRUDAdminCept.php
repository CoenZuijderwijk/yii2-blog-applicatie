<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/index");
//check to see the login button
$I->see("Login");
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->see("Username");
//filling in the login form
$I->fillField("#loginform-username" , "jan");
$I->fillField("#loginform-password", "password");
$I->click("Login", "button");
//checking if we succeed to login and got send back to the homepage
$I->amOnPage("/index");
//checking if iam logged in as admin jan
$I->amLoggedInAs(12);
$I->click("Blog");
$I->see("Create Blog");
//we start by checking the comments
$I->see("Comment overview");
//going to the comment overview page
$I->click("Comment overview");
//checking to see a certain comment with "jatoch php"
$I->see("php");
//going to the view page of the comment
$I->amOnPage("/comment/view?id=46");
$I->see("php");
//going to delete the comment
$I->click("Delete");
//checking to see if we are back on the comment index page
$I->see("Blog ID");
//going back to blog overview
$I->amOnPage("/blog");
$I->see("Create Blog");
//we are gonna create a blog
$I->click("Create Blog");
//filling in the blog
$I->fillField("#blog-title", "testTitle");
$I->fillField("#blog-inleiding", "testInleiding");
$I->fillField("#blog-slug", "testSlug");
$I->see("Save");
$I->click("Save");
//we will be redirected to the view page so we check if our content is there
$I->see("testTitle");
$I->see("testSlug");
//adding a comment
$I->see("Commentaar toevoegen");
$I->fillField("#comment-title", "gekkeTitle");
$I->fillField("#comment-slug", "gekkeSlug");
$I->click("Save");
//checking to see if we see our comment
$I->see("gekkeTitle");

//we can also delete comments because we are admins.
//we are going back to update a blogpost.
$I->amOnPage("/blog/update?id=7");
$I->see("feaf");
$I->fillField("#blog-slug", "Dit is de nieuwe inhoud van deze blog");
$I->click("Save");
$I->see("Dit is de nieuwe inhoud van deze blog");
//the blog is update and checked we also know we can read blog a post


