<?php 
$I = new AcceptanceTester($scenario);

$I->wantTo('perform actions and see result');
$I->loginAdmin($scenario);
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
$I->wait(5);
$I->amOnPage("/blog");
$I->wait(5);
$I->waitForText("Blogs", 25);
$I->wait(5);
$I->amOnPage("/blog/view?id=7");
$I->see("Attachment price verwijderen");
$I->wait(5);
$I->click("Attachment price verwijderen");
$I->waitForText("Attachment toevoegen", 25);
$I->logout($scenario);



