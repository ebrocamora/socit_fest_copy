<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rewards = [
            [
                'name' => 'Fly me to the moon',
                'description' => 'You will receive this at the start of the event.',
                'point_count' => rand(100,500),
                'code' => '3v3nt',
                'image' => 'stickers/dogecoin.png',
                'image_blank' => 'stickers/sticker1_blank.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Random 3',
                'description' => 'You will receive this at the start of the event.',
                'point_count' => rand(100,500),
                'code' => 'r4nd0m3',
                'image' => 'stickers/rocket.png',
                'image_blank' => 'stickers/sticker2_blank.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Random 6',
                'description' => 'You will receive this at the start of the event.',
                'point_count' => rand(100,500),
                'code' => 'r4ndom6',
                'image' => 'stickers/dogecoin.png',
                'image_blank' => 'stickers/sticker1_blank.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Random 167',
                'description' => 'You will receive this at the start of the event.',
                'point_count' => rand(100,500),
                'code' => 'r4nd0m167',
                'image' => 'stickers/rocket.png',
                'image_blank' => 'stickers/sticker2_blank.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('rewards')->insert($rewards);
    }
}
