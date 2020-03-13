<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
//we dont log in because we want to be a geust/user
//we are going to the blog index first
$I->amOnPage("/blog");
//then we check it by looking for a blog with lorem ipsum in it
$I->see("lorem ipsum");
//we will view this blog
$I->click("lorem ipsum");
//going to the edit page wich we should be allowed to be at.
$I->amOnPage("/blog/update?id=23");
//checking if we see the error
$I->see("(#403)");
//now we will try to delete a blog
$I->amOnPage("/blog/delete?id=23");
//checking if we see the error
$I->see("(#405)");
//now we will try to access the comment overview page
$I->amOnPage("/comment");
//checking if we see the error
$I->see("(#403)");
//we will check to see a comment
$I->amOnPage("/comment/view?id=13");
//checking if we see the error
$I->see("(#403)");
//the same goes for delete
$I->amOnPage("/comment/delete?id=13");
//checking if we see the error
$I->see("(#403)");



