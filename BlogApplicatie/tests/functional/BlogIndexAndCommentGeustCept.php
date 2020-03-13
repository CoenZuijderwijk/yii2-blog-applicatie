<?php

$I = new FunctionalTester($scenario);
//start
$I->wantTo('Check the blog functionality as a geust');
$I->amOnPage("/index");
//does see the nav button to blog page
$I->see('Blog');

$I->click("Blog");
$I->amOnPage("/blog/index");
//is on the blog page
$I->see("lorem ipsum");
//does see the page to go to a blog
$I->click("lorem ipsum");
//check to see comments
//filling in the comment form
$I->fillField("#comment-title", 'testTitle');
$I->fillField("#comment-slug", 'testSlug');
//check if he see's the submit button
$I->see("save");
$I->click("Save");
//see if he sees the changes
$I->see("testTitle");
