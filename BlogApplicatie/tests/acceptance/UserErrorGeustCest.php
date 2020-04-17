<?php

class UserErrorGeustCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function userErrorGeust(AcceptanceTester $I){
        $I->amOnPage("/user");
        $I->waitForText("(#403)",25);

        $I->amOnPage("/user/update?id=13");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/user/update?id=13");
        $I->waitForText("(#403)", 25);

        $I->amOnPage("/user/create");
        $I->waitForText("(#403)", 25);

    }
}
