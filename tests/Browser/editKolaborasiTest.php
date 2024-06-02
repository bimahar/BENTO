<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class editKolaborasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editKolaborasi1
     */
    public function testEditKolaborasi1(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator')
                    ->press('#editKolaborasi')
                    ->assertSee('Edit Collaborator')
                    ->screenshot('editKolaborasi');
        });
    }

    /**
     * A Dusk test example.
     * @group editKolaborasi2
     */
    public function testEditKolaborasi2(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/1/edit')
                    ->type('Judul', 'Kolaborasi Editan')
                    ->type('Tanggal', '12/15/2023')
                    ->type('Detail', 'Ini untuk testing')
                    ->press('Submit')
                    ->assertSee('Berhasil Diubah')
                    ->assertSee('Kolaborasi Editan')
                    ->screenshot('editKolaborasi2');
        });
    }

    /**
     * A Dusk test example.
     * @group editKolaborasi3
     */
    public function testEditKolaborasi3(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/1/edit')
                    ->attach('Gambar', __DIR__.'/files/FileSmall.pdf')
                    ->press('Submit')
                    ->assertSee('File harus format gambar')
                    ->screenshot('editKolaborasi3');
        });
    }

    /**
     * A Dusk test example.
     * @group editKolaborasi4
     */
    public function testEditKolaborasi4(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/1/edit')
                    ->assertInputValue('Judul','Kolaborasi 1')
                    ->press('Submit')
                    ->assertSee('Kolaborasi 1')
                    ->screenshot('editKolaborasi4');
        });
    }
}
