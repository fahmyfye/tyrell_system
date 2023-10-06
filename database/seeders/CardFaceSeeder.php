<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardFaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_faces')->insert([
            [
                'name' => 'Spade',
                'value' => 'S',
            ],
            [
                'name' => 'Heart',
                'value' => 'H',
            ],
            [
                'name' => 'Club',
                'value' => 'C',
            ],
            [
                'name' => 'Diamond',
                'value' => 'D',
            ],
        ]);
    }
}
