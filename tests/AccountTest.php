<?php

use App\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase {

    public function testPasswordContainSpecialCharacter () {

        $account = new Account ();

        $this->expectException (\Exception::class);

        $account->setPassword ('admin');
    }

    // public function testPasswordErrorMessage () {

    //     try {

    //         $account = new Account ();

    //         $account->setPassword ('password');

    //     } catch (\Exception $e) {

    //         $this->assertStringContainsString ('MDP contient', $e->getMessage ());
    //     }
    // }
}

?>
 