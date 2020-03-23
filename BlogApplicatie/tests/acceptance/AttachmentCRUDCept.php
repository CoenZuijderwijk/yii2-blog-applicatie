<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->waitForText("Login", 5);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->wait(2);

//filling in the login form
$I->fillField('input[id="loginform-username"]', 'coen');

$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'coen');
$I->click("Login!");
$I->waitForText("Congratulations!", 10);
$I->amOnPage("/blog/view?id=7");
$I->waitForText("Attachment toevoegen", 5);
$I->click("Attachment toevoegen");
$I->attachFile('input=[name="Attachment"]', 'price.jpg');
$I->waitForText("Upload", 5);
$I->click("Upload");
$I->waitForText("Blogs", 5);
$I->amOnPage("/blog/view?id=7");
$I->see("Attachment price verwijderen");
$I->click("Attachment price verwijderen");
$I->amOnPage("/blog/view?id=7");
$I->dontSee("Attachment price");
$I->wait(2);
