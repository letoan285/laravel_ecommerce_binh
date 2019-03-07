<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1, 
                'name' => 'Quan ao the thao', 
                'slug' => 'quan-ao-the-thao',
                'image' => 'quanao.jpg'
            ],
            [
                'id' => 2, 
                'name' => 'Quan ao phu nu', 
                'slug' => 'quan-ao-phu-nu',
                'image' => 'quanao.jpg'
            ],
            [
                'id' => 3, 
                'name' => 'Giay thoi trang', 
                'slug' => 'giay-thoi-trang',
                'image' => 'quanao.jpg'
            ],
            [
                'id' => 4, 
                'name' => 'Quan ao tre em', 
                'slug' => 'quan-ao-tre-em',
                'image' => 'quanao.jpg'
            ]
        ];
        DB::table('categories')->insert($categories);
    }
}
