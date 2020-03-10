<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
//logging in as a admin
$I->amLoggedInAs(187);
$I->amOnPage("/user");
//make sure i am on the page
$I->see("Create User");
//creating a user
$I->click("Create User");
$I->fillField("#user-username", "testUser");
$I->fillField("#user-password", "testPassword");
$I->fillField("#user-authkey", "testAuthKey");
$I->fillField("#user-accesstoken", "testToken");
$I->fillField("#user-accesslevel", 12);
$I->click("Save");
//checking if we see the filled in data
$I->see("testUser");
$I->dontSee("testPassword");
//trying to update a user
$I->amOnPage("/user/update?id=12");
$I->see("Update User");
$I->fillField("#user-username", "jantje");
$I->click("Save");
$I->see("jantje");
//user updated and viewed


