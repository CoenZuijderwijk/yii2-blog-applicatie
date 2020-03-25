<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/blog");
//checking to see a blogpost which contains a attachment
$I->waitForText("Blogs", 25);
$I->waitForText("cc", 25);
//going to the blog
$I->click("cc");
//checking by date if we are on the right blogpage
$I->waitForText("March 6", 25);
//checking if wee see the attachment
$I->waitForText("Attachment", 25);
//we cant download the attachment because it uses a different directory then the directory we use.

