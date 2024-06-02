<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BKCategoryMenu001_Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login-admin') // Menunggu kolom email muncul
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->waitForLocation('/admin/menu-makanan') // Menunggu navigasi ke halaman yang dituju
                    ->assertPathIs('/admin/menu-makanan'); // Memastikan path sesuai
        });
    }
}
