<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterNotificationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group registernotification
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('Login')
            ->ClickLink('Register Now!')
                    ->assertPathIs('/register')
                    ->type('name', 'aksanardianalberami')
                    ->type('username', 'aksa12')
                    ->type('email', 'aksanardianaz@gmail.com')
                    ->type('password', '123456')
                    ->type('phone', '082111272823')
                    ->press('Daftar')
                    ->assertPathIs('/login')
                    ->assertSee('Registrasi Berhasil☕')
                    ->screenshot('BK.RegisterNotification.001');
        });
    }
}
