<?php

$I = new AcceptanceTester($scenario);

$I->wantTo("Assign project to user");
$I->amOnPage("/assign/user/27");
$I->fillField("project", "Jacobi Ltd");
$I->click("Assign Project");