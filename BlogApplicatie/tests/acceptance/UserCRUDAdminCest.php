<?php
class UserCRUDAdminCest
{
    public function beforeTest(AcceptanceTester $I)
    {
        $I->beforeTest();
    }

    public function loginAdmin(AcceptanceTester $I)
    {
        $I->loginAdmin($I);
    }

    public function createUser(AcceptanceTester $I) {
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
    }

    public function updateUser(AcceptanceTester $I) {
        $I->amOnPage("/user/update?id=12");
        $I->wait(2);
        $I->waitForText("Update User", 25);
        $I->fillField("#user-username", "jantje");
        $I->wait(2);
        $I->click("Save");
        $I->wait(2);
        $I->waitForText("jantje", 25);
        $I->wait(2);
    }

    public function logout(AcceptanceTester $I) {
        $I->logout($I);
    }

    public function afterTest(AcceptanceTester $I)
    {
        $I->afterTest();
    }


}
