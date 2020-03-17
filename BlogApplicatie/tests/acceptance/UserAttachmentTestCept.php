<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/blog");
//checking to see a blogpost which contains a attachment
$I->see("cc");
//going to the blog
$I->click("cc");
//checking by date if we are on the right blogpage
$I->see("March 6");
//checking if wee see the attachment
$I->see("Attachment");
//we cant download the attachment because it uses a different directory then the directory we use.

