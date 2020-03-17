<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->see("Login");
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
$I->see("Create User");
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
$I->see("testUser");
$I->dontSee("testPassword");
//trying to update a user
$I->amOnPage("/user/update?id=12");
$I->wait(2);
$I->see("Update User");
$I->fillField("#user-username", "jantje");
$I->wait(2);
$I->click("Save");
$I->wait(2);
$I->see("jantje");
//user updated and viewed