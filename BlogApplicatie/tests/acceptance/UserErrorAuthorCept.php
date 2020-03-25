<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->amOnPage("/");
$I->waitForText("Login", 25);
$I->click("Login");
$I->wait(3);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'piet');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
$I->waitForText("Congratulations!", 25);
//trying to go to the users index page
$I->amOnPage("/user");
$I->waitForText("(#403)",25);
//trying to go to a edit page
$I->amOnPage("/user/update?id=13");
$I->waitForText("(#403)", 25);
//trying to go to a view page
$I->amOnPage("/user/update?id=13");
$I->waitForText("(#403)", 25);
//trying to go to the create page
$I->amOnPage("/user/create");
$I->waitForText("(#403)", 25);
$I->amOnPage("/");
$I->waitForText("Logout", 25);
$I->click("Logout");
$I->waitForText("Congratulations!", 25);