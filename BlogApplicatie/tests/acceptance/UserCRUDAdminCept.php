<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->waitForText("Login", 5);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'coen');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'coen');
$I->click("Login!");
$I->wait(2);
$I->amOnPage("/user");
//make sure i am on the page
$I->waitForText("Create User", 5);
//creating a user
$I->click("Create User");
$I->wait(2);
$I->fillField("#user-username", "testUser");
$I->fillField("#user-password", "testPassword");
$I->fillField("#user-authkey", "testAuthKey");
$I->fillField("#user-accesstoken", "testToken");
$I->fillField("#user-accesslevel", 12);
$I->wait(4);
$I->click("Save");
$I->wait(2);
//checking if we see the filled in data
$I->waitForText("testUser", 5);
$I->dontSee("testPassword");
//trying to update a user
$I->amOnPage("/user/update?id=12");
$I->wait(2);
$I->waitForText("Update User", 5);
$I->fillField("#user-username", "jantje");
$I->wait(2);
$I->click("Save");
$I->wait(2);
$I->waitForText("jantje", 5);
//user updated and viewed
//restoring the changes
$I->amOnPage("/user/update?id=12");
$I->wait(2);
$I->waitForText("Update User", 5);
$I->fillField("#user-username", "jan");
$I->fillField("#user-password", "password");
$I->wait(2);
$I->click("Save");
$I->waitForText("jan", 15);
$I->click("Logout");