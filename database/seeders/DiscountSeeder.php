<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        DB::table("discount")->insert([
            [
                'product_id'    => 1,
                'discount'      => 20.5,
                'start'         => strtotime("15 June 2022"),
                'end'           => strtotime("15 December 2022")
            ],
            [
                'product_id'    => 2,
                'discount'      => 11,
                'start'         => strtotime("15 June 2022"),
                'end'           => strtotime("15 December 2023")
            ],
            [
                'product_id'    => 3,
                'discount'      => 50.25,
                'start'         => strtotime("15 June 2022"),
                'end'           => strtotime("10 December 2022")
            ],
            [
                'product_id'    => 6,
                'discount'      => 30,
                'start'         => strtotime("15 June 2022"),
                'end'           => strtotime("30 December 2022")
            ],
            [
                'product_id'    => 8,
                'discount'      => 20.5,
                'start'         => strtotime("15 June 2022"),
                'end'           => strtotime("14 December 2022")
            ],
            [
                'product_id'    => 9,
                'discount'      => 20.5,
                'start'         => strtotime("15 June 2022"),
                'end'           => strtotime("14 December 2022")
            ]
        ]);
    }
}
