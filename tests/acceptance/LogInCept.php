<?php 
$I = new AcceptanceTester($scenario);

$I->wantTo('Log in as normal user');
$I->amOnPage('/account/login');
$I->fillField('Email', 'tyler@decipherinc.com');
$I->fillField('password', 'ty12rays');
$I->click('Login');
$I->see('Logout', 'a');

