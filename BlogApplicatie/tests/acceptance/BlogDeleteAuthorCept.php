<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->loginAuthor($scenario);
//going to the blog page
$I->click("Blog");
//going to the delete page for a blog
$I->wait(5);
$I->amOnPage("/blog/view?id=56");
$I->waitForText("Delete", 25);
$I->click("Delete");
$I->waitForText("Blogs", 25);
//i dont get redirected back so i got back by my self
//checking if id 57 is still there
$I->wait(1);
$I->dontSee("56");
$I->logout($scenario);