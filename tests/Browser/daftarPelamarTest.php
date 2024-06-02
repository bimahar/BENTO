<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class daftarPelamarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group daftarPelamar
     */
    public function testdaftarPelamar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/')
                    ->press('Lowongan Kerja')
                    ->clickLink('Pelamar')
                    ->assertSee('Daftar Pelamar Kerja')
                    ->screenshot('daftarPelamar');
        });
    }
}
