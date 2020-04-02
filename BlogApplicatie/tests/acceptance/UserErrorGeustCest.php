<?php

class UserErrorGeustCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function userIndexError(AcceptanceTester $I){
        $I->amOnPage("/user");
        $I->waitForText("(#403)",25);
    }

    public function userEditError(AcceptanceTester $I) {
        $I->amOnPage("/user/update?id=13");
        $I->waitForText("(#403)", 25);
    }

    public function userViewError(AcceptanceTester $I) {
        $I->amOnPage("/user/update?id=13");
        $I->waitForText("(#403)", 25);
    }

    public function userCreateError(AcceptanceTester $I) {
        $I->amOnPage("/user/create");
        $I->waitForText("(#403)", 25);
    }

}
