<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Ramen Bowl Tshirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 12,
                'price' => 120000,
                'sold'  => 34,
                'images'   => '["product1_a.jpeg","product1_b.jpeg","product1_c.jpeg"]'

            ],
            [
                'name' => 'Hot Lazy T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 20,
                'price' => 125000,
                'sold'  => 20,
                'images'   => '["product2_a.jpeg","product2_b.jpeg","product2_c.jpeg","product2_d.jpeg","product2_d.jpeg","product2_e.jpeg"]'

            ],
            [
                'name' => 'Anime Girl T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 11,
                'price' => 130000,
                'sold'  => 20,
                'images'   => '["product3_a.jpg","product3_b.jpg"]'

            ],
            [
                'name' => 'Cute Pink Anime Girl T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 15,
                'price' => 150000,
                'sold'  => 24,
                'images'   => '["product4_a.jpg","product4_b.jpg"]'

            ],
            [
                'name' => 'Anime Girl T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 11,
                'price' => 130000,
                'sold'  => 20,
                'images'   => '["product3_a.jpg","product3_b.jpg"]'

            ],
            [
                'name' => 'Anime Girl T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 11,
                'price' => 130000,
                'sold'  => 20,
                'images'   => '["product3_a.jpg","product3_b.jpg"]'

            ],
            [
                'name' => 'Ramen Bowl Tshirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 12,
                'price' => 120000,
                'sold'  => 34,
                'images'   => '["product1_a.jpeg","product1_b.jpeg","product1_c.jpeg"]'

            ],
            [
                'name' => 'Ramen Bowl Tshirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 12,
                'price' => 120000,
                'sold'  => 34,
                'images'   => '["product1_a.jpeg","product1_b.jpeg","product1_c.jpeg"]'

            ],
            [
                'name' => 'Ramen Bowl Tshirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 12,
                'price' => 120000,
                'sold'  => 34,
                'images'   => '["product1_a.jpeg","product1_b.jpeg","product1_c.jpeg"]'

            ],
            [
                'name' => 'Anime Girl T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 11,
                'price' => 130000,
                'sold'  => 20,
                'images'   => '["product3_a.jpg","product3_b.jpg"]'

            ],
            [
                'name' => 'Anime Girl T-Shirt',
                'description'   => ' Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available',
                'stock' => 11,
                'price' => 130000,
                'sold'  => 20,
                'images'   => '["product3_a.jpg","product3_b.jpg"]'

            ],

        ]);
    }
}
