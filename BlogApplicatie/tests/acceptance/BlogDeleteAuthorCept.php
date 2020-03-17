<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->amOnPage("/");
$I->waitForText("Login", 5);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'piet');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
$I->wait(2);
//going to the blog page
$I->click("Blog");
//going to the delete page for a blog
$I->amOnPage("/blog/delete?id=57");
//i dont get redirected back so i got back by my self
$I->wait(1);
$I->amOnPage("/blog");
//checking if id 57 is still there
$I->wait(1);
$I->dontSee("57");