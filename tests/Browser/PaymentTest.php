<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PaymentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group payment
     */
    public function testPaymentSelection(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                    ->visit('/')
                    ->clickLink('Menu')
                    ->assertPathIs('/menu')
                    ->press('Tambah') // Pastikan ada item dengan teks 'Tambah'
                    ->assertSee('Menu berhasil ditambahkan')
                    ->click('@cart') // Pastikan @cart telah didefinisikan di Dusk selectors
                    ->assertPathIs('/cart')
                    ->type('special_message', 'biji kopinya 3')
                    ->press('Bayar')
                    ->waitForLocation('/cart/checkout', 10) // Menunggu lokasi /cart/checkout
                    ->waitFor('#pay-button', 15) // Menunggu tombol #pay-button
                    ->assertSee('Checkout')
                    ->click('#pay-button') // Klik tombol bayar
                    ->pause(10000) // Menunggu 10 detik untuk memuat halaman pembayaran Midtrans
                    ->screenshot('BK.Payment.001'); // Debugging screenshot
        });
    }
}

