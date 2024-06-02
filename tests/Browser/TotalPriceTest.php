<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TotalPriceTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group totalprice
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
                    ->click('@cart')
                    ->assertPathIs('/cart')
                    ->assertSee('Total Harga')
                    ->screenshot('BK.TotalPrice.001');
        });
    }
}
