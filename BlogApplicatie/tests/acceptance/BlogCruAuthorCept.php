<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->waitForText("Login", 25);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->waitForText("Username", 25);
$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'jan');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
//checking if we succeed to login and got send back to the homepage
$I->waitForText("Congratulations!", 25);
$I->amOnPage("/blog");
//checking if we are on the blog page
//creating a blog
$I->click("Create Blog");
$I->wait(2);
//creating a blog post
$I->waitForText("Title", 25);
$I->fillField('input[id="blog-title"]', 'testTitle');
$I->wait(1);
$I->fillField('input[id="blog-inleiding"]', 'testInleiding');
$I->wait(10);
$I->executeJS("tinyMCE.activeEditor.setContent('<span>even testen</span> html');");
$I->executeJS(" console.log('executed js');");
$I->executeJS("console.log(tinymce.innerHTML);");
$I->wait(3);
$I->click("Save");
$I->waitForText("testTitle", 25);
$I->wait(2);
$I->waitForText("Delete", 25);
$I->amOnPage("/blog/update?id=46");
//opening a blog post to edit
$I->wait(2);
$I->fillField("#blog-title" , "twee");
//saving changes in blog post
$I->wait(2);
$I->click("Save");
//checking to see if the changes have been saved.
$I->wait(2);
$I->waitForText("twee", 25);
$I->wait(2);
$I->amOnPage("/blog");
$I->amOnPage("/");
$I->waitForText("Logout", 25);
$I->click("Logout");
$I->waitForText("Congratulations!", 25);


