<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->wait(1);
//filling in the login form
$I->fillField('input[id="loginform-username"]', 'jan');

$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'password');
$I->click("Login!");
//checking if we succeed to login and got send back to the homepage
//going to blogpage
$I->see("Blog");

$I->wait(3);
$I->click("Blog");
//checking if we are on the blog page
//creating a blog


$I->wait(8);
$I->see("Create Blog");
$I->wait(8);
$I->click("Create Blog");
//creating a blog post
$I->fillField('input[id="blog-title"]', 'testTitle');

$I->wait(1);
$I->fillField('input[id="blog-inleiding"]', 'testInleiding');

$I->wait(1);
$I->see('Create Blog');
$I->see('File');
$I->see("Edit");
$I->executeJS();