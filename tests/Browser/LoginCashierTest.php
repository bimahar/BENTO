<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginCashierTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group loginCashier
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('Login')
            ->assertPathIs('/login')
            ->type('email', 'adminCashier@gmail')
            ->type('password','123456')
            ->press('Login')
            ->assertSee('The email field must be a valid email address.')
            ->screenshot('BK.LoginCashier.003');
        });
    }
}
