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
$I->click("Login!");
//checking if we succeed to login and got send back to the homepage
$I->amOnPage("/index");
//going to blogpage
$I->see("Blog");
$I->click("Blog");
//checking if we are on the blog page
$I->amOnPage("/blog/index");
//checking as id not as username
$I->amLoggedInAs("12");
//creating a blog
$I->see("Create Blog");
$I->click("Create Blog");
//check to see if iam on a blog/create page
$I->amOnPage("/blog/create");
//creating a blog post
$I->fillField("#blog-title", "testTitle");
$I->fillField("#blog-inleiding", "testInleiding");
$I->fillField("#blog-slug", "testSlug");
$I->see("Save");
$I->click("Save");
//opening a blog post to edit
$I->amOnPage("/blog/update?id=89");
$I->see("testTitle");
$I->fillField("#blog-title" , "twee");
//saving changes in blog post
$I->click("Save");
//checking to see if the changes have been saved.
$I->see("twee");





