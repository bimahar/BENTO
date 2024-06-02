<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\DashboardKollabSeeder;
use Database\Seeders\LowonganSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            MenuSeeder::class,
            DashboardKollabSeeder::class,
            LowonganSeeder::class
        ]);

        $user = User::create([
            'name' => 'adminCashier ',
            'username' => 'Cashier',
            'email' => 'adminCashier@gmail.com',
            'phone' => '08211117827',
            'password' => bcrypt('123456')
        ]);

        $cartData = [
            'user_id' => $user->id
        ];

        $user = User::create([
            'name' => 'adminApp ',
            'username' => 'App',
            'email' => 'adminApp@gmail.com',
            'phone' => '08211117826',
            'password' => bcrypt('123456')
        ]);

        $cartData = [
            'user_id' => $user->id
        ];

        $user = User::create([
            'name' => 'user ',
            'username' => 'User1 ',
            'email' => 'user1@gmail.com',
            'phone' => '08211117828',
            'password' => bcrypt('123456')
        ]);

        $cartData = [
            'user_id' => $user->id
        ];

        User::create([
            'name' => 'faqih ',
            'username' => 'faqih',
            'email' => 'faqih@mail.com',
            'phone' => '0814211419',
            'password' => bcrypt('123456')
        ]);

        $cartData = [
            'user_id' => $user->id
        ];
    }
}
