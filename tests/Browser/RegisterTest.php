<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     * @group register
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->ClickLink('Register Now!')
                    ->assertPathIs('/register')
                    ->type('name', 'aksanardian')
                    ->type('username', 'aksa12')
                    ->type('email', 'aksanardian310@gmail.com')
                    ->type('password', '789312')
                    ->type('phone', '082111272823')
                    ->press('Daftar')
                    ->assertSee('The email has already been taken.')
                    ->screenshot('BK.RegisterUser.004');
        });
    }
}
