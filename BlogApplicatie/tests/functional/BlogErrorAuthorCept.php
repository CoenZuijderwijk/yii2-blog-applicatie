<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
//logging in as an author
$I->amLoggedInAs(13);
$I->amOnPage("/blog");
$I->see("Create Blog");
//going to update a blog which doesnt belong to piet(user 13)
$I->amOnPage("/blog/update?id=3");
$I->see("Acces Denied");
//going to delete a blog which doesnt belong to piet(user 13)
$I->amOnPage("/blog/delete?id=3");
$I->see("Acces Denied");
//going to the comment index page
$I->amOnPage("/comment");
$I->see("Acces Denied");
//trying to view a comment
$I->amOnPage("/comment/view?id=13");
$I->see("Acces Denied");
//trying to edit a comment
$I->amOnPage("/comment/update?id=13");
$I->see("Acces Denied");
//trying to delete a comment
$I->amOnPage("/comment/delete?id=13");
$I->see("Acces Denied");