<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/blog");
//checking to see a blogpost which contains a attachment
$I->waitForText("cc", 5);
//going to the blog
$I->click("cc");
//checking by date if we are on the right blogpage
$I->waitForText("March 6", 5);
//checking if wee see the attachment
$I->waitForText("Attachment", 5);
//we cant download the attachment because it uses a different directory then the directory we use.

