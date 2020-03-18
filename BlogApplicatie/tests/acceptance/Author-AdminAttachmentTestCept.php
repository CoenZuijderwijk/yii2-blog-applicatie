<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage("/");
$I->wantTo('perform actions and see result');
//going to login page
$I->waitForText("Login", 5);
$I->click("Login");
//filling in the login form
$I->wait(1);
$I->fillField('input[id="loginform-username"]', 'coen');
$I->fillField('input[name="LoginForm[password]"]', 'coen');
//login in
$I->click("Login!");
//going to a random blog
$I->wait(1);
$I->amOnPage("/blog/view?id=49");

//checking if we see the add attachment button
$I->waitForText("Attachment toevoegen",5);
$I->click("Attachment toevoegen");
//checking if we are on the right page
$I->waitForText("Files", 5);
//test completed logging in as a author
$I->amOnPage("/blog");
$I->click("Logout");
$I->waitForText("Congratulations", 5);
$I->amOnPage("/site/login");
$I->wait(3);
$I->see("Login");
$I->fillField('input[id="loginform-username"]', 'piet');
$I->wait(3);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
$I->wait(1);
//going to a different authors blog
$I->amOnPage("/blog/view?id=3");
//checking if we see the right things
$I->dontSee("Attachment toevoegen");
$I->waitForText("Attachment", 5);
$I->wait(1);
//going to a blog created by piet(user 13)
$I->amOnPage("/blog/view?id=56");
//checking if we see the right things
$I->waitForText("Attachment toevoegen", 5);
$I->dontSee("Attachment smile");


