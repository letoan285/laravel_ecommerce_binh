<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 200; $i++){
            $product = [
               'name' => 'Product '.$i,
                'slug' => 'Product-'.$i,
                'sell_price' => rand(1000, 5000),
                'stock' => rand(1000, 5000),
                'status' => rand(0, 1),
            ];
            DB::table('products')->insert($product);
        }

    }
}
