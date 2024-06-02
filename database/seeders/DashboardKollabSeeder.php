<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardKollabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dashboard_kollabs')->insert([
            [
                'Judul' => 'Kolaborasi 1',
                'Detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quidem repellat vel, veniam amet facere iste laboriosam minus laudantium consequuntur minima quaerat? Enim, labore? Harum fuga cum repellendus id aut nihil minus praesentium officia quos inventore error dolore, similique iure ullam dicta, hic quia, nesciunt ipsum? Beatae temporibus nihil odio dignissimos fuga explicabo dolore, aliquid alias deserunt asperiores dolores modi quis est, ullam odit officia atque voluptate ratione voluptas. Sint fugit praesentium aliquid eius dolorem veniam aliquam, ipsa tenetur ratione aspernatur adipisci enim accusantium. Asperiores reiciendis cum at labore dolore impedit iure hic voluptatum nobis. Officiis velit voluptates sequi porro.',
                'Tanggal' => '2023-04-01',
            ],
            [
                'Judul' => 'Kolaborasi 2',
                'Detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta quaerat mollitia quam labore assumenda recusandae consequatur est nemo nisi fuga. Debitis doloribus, qui fuga voluptates eligendi nostrum? Earum, rerum ducimus, aut saepe culpa vitae facere quo quis est alias consectetur nemo error itaque beatae corporis? Optio dolorem laboriosam fuga maiores?',
                'Tanggal' => '2023-04-02',
            ]
        ]);
    }
}



