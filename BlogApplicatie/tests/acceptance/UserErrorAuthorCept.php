<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->amOnPage("/");
$I->wait(5);
$I->amOnPage("/");
$I->click("Login");
$I->wait(7);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'piet');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
$I->wait(2);
//trying to go to the users index page
$I->amOnPage("/user");
$I->wait(2);
$I->waitForText("(#403)",15);
//trying to go to a edit page
$I->amOnPage("/user/update?id=13");
$I->waitForText("(#403)", 5);
//trying to go to a view page
$I->amOnPage("/user/update?id=13");
$I->waitForText("(#403)", 5);
//trying to go to the create page
$I->amOnPage("/user/create");
$I->waitForText("(#403)", 5);

