<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
//logging in as an author
$I->amLoggedInAs(13);
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
