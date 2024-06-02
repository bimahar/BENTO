<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->click('@userDropdown') // Mengklik dropdown user
                    ->click('@logoutLink') // Mengklik link logout yang membuka modal
                    ->waitFor('@modalLogout') // Menunggu modal muncul
                    ->within('@modalLogout', function (Browser $modal) {
                        $modal->press('Logout'); // Menekan tombol logout di modal
                    })
                    ->waitForLocation('/')
                    ->assertPathIs('/') // Memastikan di-redirect ke halaman beranda
                    ->assertSee('Anda berhasil logout') // Memastikan pesan logout muncul
                    ->screenshot('BK.Logout.001');
        });
    }
}
