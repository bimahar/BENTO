<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class HomepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group homepage
     */
    public function testExample(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->pause(2000)
                    ->assertSee('Inspirasi');
        });
    }
}
