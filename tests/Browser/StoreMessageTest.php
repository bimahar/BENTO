<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StoreMessageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group storemessage
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
                    ->type('special_message','biji kopinya 3')
                    ->press('Bayar')
                    ->assertPathIs('/cart/checkout')
                    ->screenshot('BK.StoreMessage.001');
        });
    }
}
