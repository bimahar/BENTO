<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class daftarKolaboratorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group DaftarKolaborator1
     */
    public function testDaftarKolaborator1(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborasi')
                    ->press('#detailDeskripsi')
                    ->assertSee('Tanggal Pengajuan');
        });
    }

    /**
     * A Dusk test example.
     * @group DaftarKolaborator2
     */
    public function testDaftarKolaborator2(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborasi')
                    ->press('#Unduh')
                    ->refresh()
                    ->assertSee('File berhasil diunduh.')
                    ->screenshot('unduhSurat');
        });
    }
}
