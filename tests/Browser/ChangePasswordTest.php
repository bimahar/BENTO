<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ChangePasswordTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group changepassword
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertPathIs('/login')
                    ->clickLink('Click here')
                    ->type('email', 'user1@gmail.com')
                    ->press('Submit')
                    ->assertSee('Kami telah mengirimkan link ke email anda')
                    ->screenshot('BK.ChangePassword.001');
        });
    }
}
