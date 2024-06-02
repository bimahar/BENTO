<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StoreMenuTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group storemenu
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->clickLink('Menu')
                    ->assertPathIs('/menu')
                    ->press('Tambah')
                    ->assertPathIs('/menu')
                    ->assertSee('Menu berhasil ditambahkan')
                    ->screenshot('BK.StoreMenu.001');
        });
    }
}
