<?php
class UserCRUDAdminCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->beforeTest();
    }

    public function userCRUDAdminTest(AcceptanceTester $I)
    {
        $I->loginAdmin($I);

        $I->amOnPage("/user/create");
        $I->waitForText("Username", 25);
        $I->wait(3);
        $I->fillField("#user-username", "testUser");
        $I->fillField("#user-password", "testPassword");
        $I->fillField("#user-authkey", "testAuthKey");
        $I->fillField("#user-accesstoken", "testToken");
        $I->fillField("#user-accesslevel", 12);
        $I->wait(4);
        $I->click("Save");
        $I->wait(2);
        $I->wait(3);
        $I->see("testUser");
        $I->wait(3);
        $I->dontSee("testPassword");

        $I->amOnPage("/user/update?id=12");
        $I->wait(2);
        $I->waitForText("Update User", 25);
        $I->fillField("#user-username", "jantje");
        $I->wait(2);
        $I->click("Save");
        $I->wait(2);
        $I->waitForText("jantje", 25);
        $I->wait(2);

        $I->logout($I);

    }

    public function _after(AcceptanceTester $I)
    {
        $I->afterTest();
    }


}
