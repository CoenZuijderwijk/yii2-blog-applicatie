<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
//check to see the login button
$I->waitForText("Login", 25);
//clicking the login button
$I->click("Login");
//making sure i am on the login page
$I->wait(2);

//filling in the login form
$I->fillField('input[id="loginform-username"]', 'coen');
$I->wait(1);
$I->fillField('input[name="LoginForm[password]"]', 'coen');
$I->click("Login!");
$I->waitForText("Congratulations!", 25);
$I->amOnPage("/blog/view?id=7");
$I->waitForText("Attachment toevoegen", 25);
$I->click("Attachment toevoegen");
$I->waitForText("files");
//commented attachfile out because its a hiddentype and the rest will will give errors
$I->see("Browse");
$I->executeJS("document.getElementById('input-bla').style.opacity = 100;");
$I->attachFile('input[id="input-bla"]', 'price.jpg');
$I->waitForText("Upload", 25);
$I->click("Upload");
$I->waitForText("Blogs", 25);
$I->wait(5);
$I->amOnPage("/blog/view?id=7");
$I->see("Attachment price verwijderen");
$I->click("Attachment price verwijderen");
$I->waitForText("Attachment toevoegen", 25);
$I->amOnPage("/");
$I->waitForText("Logout", 25);
$I->click("Logout");
$I->waitForText("Congratulations!", 25);



