<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//check to see the login button
$I->amOnPage("/");
$I->waitForText("Login", 5);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'piet');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
$I->wait(2);
$I->amOnPage("/blog");
$I->waitForText("Create Blog", 5);
//going to update a blog which doesnt belong to piet(user 13)
$I->amOnPage("/blog/update?id=3");
$I->waitForText("(#403)", 5);
//going to delete a blog which doesnt belong to piet(user 13)
$I->amOnPage("/blog/delete?id=3");
$I->waitForText("(#405)", 5);
//going to the comment index page
$I->amOnPage("/comment");
$I->waitForText("(#403)", 5);
//trying to view a comment
$I->amOnPage("/comment/view?id=13");
$I->waitForText("(#403)", 5);
//trying to edit a comment
$I->amOnPage("/comment/update?id=13");
$I->waitForText("(#404)", 5);
//trying to delete a comment
$I->amOnPage("/comment/delete?id=13");
$I->waitForText("(#403)", 5);
$I->click("Logout");
