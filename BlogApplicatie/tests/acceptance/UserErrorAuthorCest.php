<?php

class UserErrorAuthorCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function userErrorAuthor(AcceptanceTester $I)
    {
        $I->loginAuthor($I);

        $I->amOnPage("/user");
        $I->waitForText("(#403)",25);

        $I->amOnPage("/user/update?id=13");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/user/update?id=13");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/user/create");
        $I->waitForText("(#403)", 25);

        $I->logout($I);
    }
}
