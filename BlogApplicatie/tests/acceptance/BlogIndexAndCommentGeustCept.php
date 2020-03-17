<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Check the blog functionality as a geust');
$I->amOnPage("/");
//does see the nav button to blog page
$I->waitForText("Blog", 5);

$I->click("Blog");
//is on the blog page
$I->waitForText("piet", 5);
//does see the page to go to a blog
$I->amOnPage("/blog/view?id=3");
//check to see comments
//filling in the comment form
$I->executeJS('window.scrollTo(0,450);');
$I->wait(2);
$I->fillField('input[id="comment-title"]', 'testTitle');
$I->wait(2);
$I->fillField('#comment-slug', 'testSlug');
$I->wait(5);
$I->click("Save");
$I->wait(2);
//see if he sees the changes
$I->waitForText("testTitle", 5);