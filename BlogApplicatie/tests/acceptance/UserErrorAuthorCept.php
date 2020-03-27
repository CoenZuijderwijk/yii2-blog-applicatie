<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->loginAuthor($scenario);
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
$I->logout($scenario);