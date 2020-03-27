<?php

$I = new AcceptanceTester($scenario);
$I->loginAdmin($scenario);
//going to a random blog
$I->amOnPage("/blog/view?id=49");
//checking if we see the add attachment button
$I->waitForText("Attachment toevoegen",25);
$I->click("Attachment toevoegen");
//checking if we are on the right page
$I->waitForText("Files", 25);
//test completed logging in as a author
$I->amOnPage("/blog");
$I->logout($scenario);
$I->loginAuthor($scenario);
$I->wait(5);
//going to a different authors blog
$I->amOnPage("/blog/view?id=3");
//checking if we see the right things
$I->dontSee("Attachment toevoegen");
$I->waitForText("Attachment", 25);
//going to a blog created by piet(user 13)
$I->amOnPage("/blog/view?id=56");
//checking if we see the right things
$I->waitForText("Attachment toevoegen", 25);
$I->dontSee("Attachment smile");
$I->logout($scenario);


