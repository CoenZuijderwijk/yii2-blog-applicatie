<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->waitForText("Login", 5);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->waitForText("Username", 5);

$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'jan');

$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
//checking if we succeed to login and got send back to the homepage
//going to blogpage
$I->wait(2);
$I->waitForText("Congratulations!", 10);
$I->amOnPage("/blog");
//checking if we are on the blog page
//creating a blog
$I->click("Create Blog");
$I->wait(2);
//creating a blog post
$I->waitForText("Title", 5);
$I->fillField('input[id="blog-title"]', 'testTitle');

$I->wait(1);
$I->fillField('input[id="blog-inleiding"]', 'testInleiding');

$I->wait(1);
$I->executeJS("tinyMCE.activeEditor.setContent('<span>even testen</span> html');");
$I->executeJS(" console.log('executed js');");
$I->executeJS("console.log(tinymce.innerHTML);");

$I->wait(3);
$I->click("Save");
$I->wait(5);
$I->see("even testen");
$I->amOnPage("/blog/update?id=46");
//opening a blog post to edit
$I->wait(2);
$I->fillField("#blog-title" , "twee");
//saving changes in blog post
$I->wait(2);
$I->click("Save");
$I->wait(2);
//checking to see if the changes have been saved.
$I->waitForText("twee", 5);





