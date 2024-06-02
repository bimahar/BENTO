<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class statusPelamarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group statusPelamar
     */
    public function testStatusPelamar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/pelamar')
                    ->press('#showPelamar')
                    ->select('status', 'Terima')
                    ->press('Simpan')
                    ->assertSee('Status Berhasil Diubah')
                    ->assertSee('Terima')
                    ->screenshot('statusPelamar');
        });
    }
}
