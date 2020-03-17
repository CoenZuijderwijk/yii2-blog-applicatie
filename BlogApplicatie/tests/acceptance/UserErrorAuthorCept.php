<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->amOnPage("/");
$I->see("Login");
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
//trying to go to the users index page
$I->amOnPage("/user");
$I->see("(#403)");
//trying to go to a edit page
$I->amOnPage("/user/update?id=13");
$I->see("(#403)");
//trying to go to a view page
$I->amOnPage("/user/update?id=13");
$I->see("(#403)");
//trying to go to the create page
$I->amOnPage("/user/create");
$I->see("(#403)");

