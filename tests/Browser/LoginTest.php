<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.

     * @group login

     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/login')
                    ->clickLink('Login')
                    ->assertPathIs('/login')
                    ->type('email', 'user1@gmail')
                    ->type('password','123456')
                    ->press('Login')
                    ->assertSee('The email field must be a valid email address.')
                    ->screenshot('BK.Login.003');
                  
        });
    }
}
