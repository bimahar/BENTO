<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class AboutusTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group aboutUs
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->clickLink('About us')
                    ->assertPathIs('/about')
                    ->assertSee('Our Story');
        });
    }
}
