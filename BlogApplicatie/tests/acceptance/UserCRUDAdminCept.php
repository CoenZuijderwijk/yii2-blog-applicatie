<?php 
$I = new AcceptanceTester($scenario);
$I->loginAdmin($scenario);
$I->wantTo('perform actions and see result');
$I->wait(5);
$I->amOnPage("/user");
//make sure i am on the page
$I->waitForText("Create User", 25);
//creating a user
$I->click("Create User");
$I->waitForText("Username", 25);
$I->fillField("#user-username", "testUser");
$I->fillField("#user-password", "testPassword");
$I->fillField("#user-authkey", "testAuthKey");
$I->fillField("#user-accesstoken", "testToken");
$I->fillField("#user-accesslevel", 12);
$I->wait(4);
$I->click("Save");
$I->wait(2);
//checking if we see the filled in data
$I->wait(3);
$I->see("testUser");
$I->wait(3);
$I->dontSee("testPassword");
//trying to update a user
$I->amOnPage("/user/update?id=12");
$I->wait(2);
$I->waitForText("Update User", 25);
$I->fillField("#user-username", "jantje");
$I->wait(2);
$I->click("Save");
$I->wait(2);
$I->waitForText("jantje", 25);
//user updated and viewed
//restoring the changes
$I->amOnPage("/user/update?id=12");
$I->wait(2);
$I->waitForText("Update User", 25);
$I->fillField("#user-username", "jan");
$I->fillField("#user-password", "password");
$I->wait(2);
$I->click("Save");
$I->waitForText("jan", 25);
$I->logout($scenario);