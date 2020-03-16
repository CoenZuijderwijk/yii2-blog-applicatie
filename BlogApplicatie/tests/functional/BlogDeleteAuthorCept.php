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
$I->fillField("#loginform-username" , "piet");
$I->fillField("#loginform-password", "password");
$I->click("Login!");
//checking if iam logged in as piet with id 12
$I->amLoggedInAs(12);
//going to the blog page
$I->click("Blog");
//looking for an iconic element
$I->seeElement(".glyphicon-eye-open");
//going to the delete page for a blog
$I->amOnPage("/blog/delete?id=57");
//i dont get redirected back so i got back by my self
$I->amOnPage("/blog");
//checking if id 57 is still there
$I->dontSee("57");

