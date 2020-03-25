<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage("/");
$I->waitForText("Login", 25);
$I->click("Login");
$I->wait(3);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'coen');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'coen');
$I->click("Login!");
$I->waitForText("Congratulations!", 25);
//going to a random blog
$I->amOnPage("/blog/view?id=49");
//checking if we see the add attachment button
$I->waitForText("Attachment toevoegen",25);
$I->click("Attachment toevoegen");
//checking if we are on the right page
$I->waitForText("Files", 25);
//test completed logging in as a author
$I->amOnPage("/blog");
$I->click("Logout");
$I->waitForText("Congratulations", 25);
$I->amOnPage("/site/login");
$I->wait(2);
$I->fillField('input[id="loginform-username"]', 'piet');
$I->fillField('input[name="LoginForm[password]"]', 'password');
//login in
$I->click("Login!");
$I->wait(5);
$I->waitForText("Congratulations!", 25);
$I->wait(5);
//going to a different authors blog
$I->amOnPage("/blog/view?id=3");
//checking if we see the right things
$I->dontSee("Attachment toevoegen");
$I->waitForText("Attachment", 25);
//going to a blog created by piet(user 13)
$I->amOnPage("/blog/view?id=56");
//checking if we see the right things
$I->waitForText("Attachment toevoegen", 25);
$I->dontSee("Attachment smile");
$I->amOnPage("/");
$I->waitForText("Logout", 25);
$I->click("Logout");
$I->waitForText("Congratulations!", 25);


