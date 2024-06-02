<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class TambahKolaborasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group TambahKolaborasi1
     */
    public function testTambahKolaborasi1(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator')
                    ->press('Add Collaborator')
                    ->assertSee('New Collaborator');
        });
    }

    /**
     * A Dusk test example.
     * @group TambahKolaborasi2
     */
    public function testTambahKolaborasi2(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/new')
                    ->type('Judul', 'Kolaborasi Baru')
                    ->type('Tanggal', '12/14/2023')
                    ->attach('Gambar', __DIR__.'/files/Image1.jpg')
                    ->select('Status', 'Posted')
                    ->type('Detail', 'Ini untuk testing')
                    ->Press('Submit')
                    ->assertSee('Berhasil')
                    ->assertSee('Kolaborasi Baru');
        });
    }

    /**
     * A Dusk test example.
     * @group TambahKolaborasi3
     */
    public function testTambahKolaborasi3(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/new')
                    ->type('Judul', 'Kolaborasi Baru kedua')
                    ->type('Tanggal', '12/14/2023')
                    ->select('Status', 'Posted')
                    ->type('Detail', 'Ini untuk testing')
                    ->Press('Submit')
                    ->assertSee('Berhasil')
                    ->assertSee('Kolaborasi Baru Kedua');
        });
    }

    /**
     * A Dusk test example.
     * @group TambahKolaborasi4
     */
    public function testTambahKolaborasi4(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/new')
                    ->type('Judul', 'Kolaborasi Baru Ketiga')
                    ->type('Tanggal', '12/14/2023')
                    ->attach('Gambar', __DIR__.'/files/FileSmall.pdf')
                    ->select('Status', 'Posted')
                    ->type('Detail', 'Ini untuk testing')
                    ->Press('Submit')
                    ->assertSee('File harus format gambar')
                    ->screenshot('TambahKolaborasi4');
        });
    }

    /**
     * A Dusk test example.
     * @group TambahKolaborasi5
     */
    public function testTambahKolaborasi5(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/dashboard/kolaborator/new')
                    ->Press('Submit')
                    ->assertSee('Kolom judul harus terisi')
                    ->assertSee('Pilih tanggal!')
                    ->assertSee('Kolom detail harus terisi')
                    ->screenshot('TambahKolaborasi5');
        });
    }
}