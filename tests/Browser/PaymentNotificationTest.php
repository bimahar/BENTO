<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PaymentNotificationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group paymentnotification
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
                    ->screenshot('before_midtrans_payment') // Debugging screenshot

                    // Menangani iframe pertama (Midtrans)
                    ->withinFrame('iframe', function (Browser $iframe) { // Selektor iframe pembayaran Midtrans
                        $iframe->waitFor('.list[data-testid="list-item"]', 10)
                               ->click('.list[data-testid="list-item"][href="#/credit-card"]')
                               ->waitFor('input[autocomplete="cc-number"]', 10)
                               ->type('input[autocomplete="cc-number"]', '4811111111111114')
                               ->type('input[autocomplete="cc-exp"]', '1234')
                               ->type('input[autocomplete="cc-csc"]', '123')
                               ->click('.btn-theme') // Klik tombol Pay Now
                               ->pause(10000); // Menunggu 10 detik untuk memuat halaman pemrosesan OTP
                            //    ->screenshot('midtrans_payment'); // Debugging screenshot
                    })

                    // Tambahan jeda untuk menunggu pemuatan halaman Issuing Bank
                    ->pause(15000) // Menunggu 15 detik untuk pemuatan halaman Issuing Bank
                    // ->screenshot('before_issuing_bank') // Debugging screenshot

                    // Menangani iframe kedua (Issuing Bank)
                    ->waitFor('iframe', 10) // Tunggu sampai iframe ada
                    ->pause(2000) // Menambah jeda untuk memastikan iframe telah termuat
                    ->withinFrame(1, function (Browser $iframe) { // Menggunakan index untuk iframe kedua
                        $iframe->waitFor('input[name="otp"]', 15)
                               ->type('input[name="otp"]', '112233')
                               ->press('OK')
                               ->pause(10000); // Menunggu 10 detik untuk memuat hasil pembayaran
                            //    ->screenshot('otp_entry'); // Debugging screenshot
                    })

                    ->assertSee('Payment successful') // Memastikan pembayaran berhasil
                    ->screenshot('payment_successful'); // Debugging screenshot

        });
    }
}
