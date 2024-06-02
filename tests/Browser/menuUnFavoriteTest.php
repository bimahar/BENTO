<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class menuUnFavoriteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group menuUnFavorite
     */
    public function testUnFavorite(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->maximize()
                    ->press('#unLove')
                    ->refresh()
                    ->assertDontSee('Coffee 2')
                    ->screenshot('menuUnFavorite');
        });
    }
}
