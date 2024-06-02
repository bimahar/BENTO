<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lowongan::create([
            'judul' => 'Open Reqruitmen Admin',
            'deskripsi' => '   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt sapiente porro minus doloribus id. Corporis delectus velit exercitationem labore numquam consectetur modi. Libero, ex est non odio ratione porro quod animi natus, exercitationem modi et expedita ducimus maiores asperiores enim itaque quas mollitia esse nobis. Aliquam quis eaque dolorem consequatur odio dolore soluta atque voluptatibus assumenda nemo omnis id, illum sint voluptatum. Velit animi aliquam autem id nobis, vero excepturi facere dignissimos quos nam harum cumque expedita est itaque, minus quisquam? Perspiciatis maiores deserunt labore. Incidunt iusto libero quae delectus! Totam, aperiam culpa? Inventore fuga nisi ipsa aut sunt commodi repellendus eveniet perspiciatis voluptate perferendis dolorum aperiam porro totam provident ut reiciendis dolores fugiat cum, ex veritatis modi a nesciunt sit temporibus. Reprehenderit voluptates quas dolor accusamus sit est, rerum libero recusandae corrupti nemo quisquam, a asperiores amet temporibus fuga maiores error perferendis mollitia porro cum itaque laborum? Nesciunt deserunt vero sequi sit deleniti inventore voluptate incidunt labore officia! Suscipit consectetur ipsum, enim dolorum nulla debitis sint, error beatae consequatur quam, eum ut magnam. Velit ullam maxime tempore. Incidunt error dicta excepturi repellendus facere debitis culpa, mollitia reprehenderit dolor ipsam voluptate cumque omnis perspiciatis deleniti eaque officiis id minima? Doloremque accusamus quas cupiditate voluptatum laboriosam iusto. Deleniti maxime voluptatum, id sapiente dolorem tempore vitae eius culpa perspiciatis sunt velit at veritatis molestiae quis accusamus pariatur necessitatibus quaerat mollitia unde fugiat illum asperiores voluptatem magnam. Cum quis veniam nobis libero, consequatur expedita! Laboriosam voluptates blanditiis aliquid! Praesentium cupiditate qui explicabo nam ipsum laudantium nisi dicta voluptatibus harum facilis. Sapiente illum enim eligendi voluptatem nisi voluptatum ipsum, impedit, atque possimus placeat excepturi corporis reprehenderit quo, odio fugit distinctio cupiditate. Perspiciatis, aperiam accusamus? Sint aliquid eligendi itaque, laborum adipisci qui esse voluptatem fugit dolore neque perspiciatis veniam libero modi velit quod quibusdam dolor.',
            'tanggal_buka' => Carbon::now()->format('Y-m-d'),
            'tanggal_tutup' => Carbon::now()->addDays(5),
            'status' => 1
        ]);

        Lowongan::create([
            'judul' => 'Open Reqruitmen Kasir',
            'deskripsi' => '   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt sapiente porro minus doloribus id. Corporis delectus velit exercitationem labore numquam consectetur modi. Libero, ex est non odio ratione porro quod animi natus, exercitationem modi et expedita ducimus maiores asperiores enim itaque quas mollitia esse nobis. Aliquam quis eaque dolorem consequatur odio dolore soluta atque voluptatibus assumenda nemo omnis id, illum sint voluptatum. Velit animi aliquam autem id nobis, vero excepturi facere dignissimos quos nam harum cumque expedita est itaque, minus quisquam? Perspiciatis maiores deserunt labore. Incidunt iusto libero quae delectus! Totam, aperiam culpa? Inventore fuga nisi ipsa aut sunt commodi repellendus eveniet perspiciatis voluptate perferendis dolorum aperiam porro totam provident ut reiciendis dolores fugiat cum, ex veritatis modi a nesciunt sit temporibus. Reprehenderit voluptates quas dolor accusamus sit est, rerum libero recusandae corrupti nemo quisquam, a asperiores amet temporibus fuga maiores error perferendis mollitia porro cum itaque laborum? Nesciunt deserunt vero sequi sit deleniti inventore voluptate incidunt labore officia! Suscipit consectetur ipsum, enim dolorum nulla debitis sint, error beatae consequatur quam, eum ut magnam. Velit ullam maxime tempore. Incidunt error dicta excepturi repellendus facere debitis culpa, mollitia reprehenderit dolor ipsam voluptate cumque omnis perspiciatis deleniti eaque officiis id minima? Doloremque accusamus quas cupiditate voluptatum laboriosam iusto. Deleniti maxime voluptatum, id sapiente dolorem tempore vitae eius culpa perspiciatis sunt velit at veritatis molestiae quis accusamus pariatur necessitatibus quaerat mollitia unde fugiat illum asperiores voluptatem magnam. Cum quis veniam nobis libero, consequatur expedita! Laboriosam voluptates blanditiis aliquid! Praesentium cupiditate qui explicabo nam ipsum laudantium nisi dicta voluptatibus harum facilis. Sapiente illum enim eligendi voluptatem nisi voluptatum ipsum, impedit, atque possimus placeat excepturi corporis reprehenderit quo, odio fugit distinctio cupiditate. Perspiciatis, aperiam accusamus? Sint aliquid eligendi itaque, laborum adipisci qui esse voluptatem fugit dolore neque perspiciatis veniam libero modi velit quod quibusdam dolor.',
            'tanggal_buka' => Carbon::now()->format('Y-m-d'),
            'tanggal_tutup' => Carbon::now()->addDays(5),
            'status' => 1
        ]);
    }
}
