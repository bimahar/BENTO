<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class kelolaKolaborasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group kelolaKolaborasi1
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/')
                    ->press('Kolaborasi')
                    ->clickLink('Daftar Kolaborasi')
                    ->assertSee('Kolaborasi 1');
        });
    }

    /**
     * A Dusk daftar kolaborator.
     * @group kelolaKolaborasi2
     */

    public function testDaftarKolaborator(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/')
                    ->press('Kolaborasi')
                    ->clickLink('Daftar Kolaborator')
                    ->assertSee('Jabatan')
                    ->screenshot('tes');
        });
    }
}
