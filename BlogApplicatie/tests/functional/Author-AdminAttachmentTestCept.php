<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
//logging in as admin
$I->amLoggedInAs(187);
//going to a random blog
$I->amOnPage("/blog/view?id=49");
//checking if we see the add attachment button
$I->see("Attachment toevoegen");
$I->click("Attachment toevoegen");
//checking if we are on the right page
$I->see("Files");
//test completed logging in as a author
$I->amOnPage("/blog");
$I->amLoggedInAs(13);
//going to a different authors blog
$I->amOnPage("/blog/view?id=3");
//checking if we see the right things
$I->dontSee("Attachment toevoegen");
$I->see("Attachment");
//going to a blog created by piet(user 13)
$I->amOnPage("/blog/view?id=56");
//checking if we see the right things
$I->see("Attachment toevoegen");
$I->dontSee("Attachment smile");


