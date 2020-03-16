<?php 
$I = new AcceptanceTester($scenario);
$I->amOnPage("/");
$I->wantTo('perform actions and see result');
//going to login page
$I->see("Login");
$I->click("Login");
//filling in the login form
$I->see("Username");
$I->wait(1);
$I->fillField('input[id="loginform-username"]', 'coen');
$I->fillField('input[name="LoginForm[password]"]', 'coen');
//login in
$I->click("Login!");
//going to a random blog
$I->wait(1);
$I->amOnPage("/blog/view?id=49");

//checking if we see the add attachment button
$I->see("Attachment toevoegen");
$I->click("Attachment toevoegen");
//checking if we are on the right page
$I->see("Files");
//test completed logging in as a author
$I->amOnPage("/blog");
$I->click("Logout");
$I->wait(2);
$I->click("Login");
$I->wait(5);
$I->fillField('input[id="loginform-username"]', 'piet');

$I->wait(3);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
$I->wait(1);
//going to a different authors blog
$I->amOnPage("/blog/view?id=3");
//checking if we see the right things
$I->dontSee("Attachment toevoegen");
$I->see("Attachment");
$I->wait(1);
//going to a blog created by piet(user 13)
$I->amOnPage("/blog/view?id=56");
//checking if we see the right things
$I->see("Attachment toevoegen");
$I->dontSee("Attachment smile");


