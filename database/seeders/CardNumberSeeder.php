<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_numbers')->insert([
            [
                'name' => 'A',
                'value' => 1,
            ],
            [
                'name' => '2',
                'value' => 2,
            ],
            [
                'name' => '3',
                'value' => 3,
            ],
            [
                'name' => '4',
                'value' => 4,
            ],
            [
                'name' => '5',
                'value' => 5,
            ],
            [
                'name' => '6',
                'value' => 6,
            ],
            [
                'name' => '7',
                'value' => 7,
            ],
            [
                'name' => '8',
                'value' => 8,
            ],
            [
                'name' => '9',
                'value' => 9,
            ],
            [
                'name' => 'X',
                'value' => 10,
            ],
            [
                'name' => 'J',
                'value' => 11,
            ],
            [
                'name' => 'Q',
                'value' => 12,
            ],
            [
                'name' => 'K',
                'value' => 13,
            ],
        ]);
    }
}
