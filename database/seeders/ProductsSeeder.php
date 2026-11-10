<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['id' => 1, 'name' => 'MacBook Pro 14', 'description' => 'Apple M2 Pro, 16GB RAM, 512GB SSD', 'image' => 'macbook pro 16.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 1],
            ['id' => 2, 'name' => 'MSI GF65 Thin', 'description' => 'Intel Core i5, GTX 1650, 8GB RAM', 'image' => 'product-2.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 2],
            ['id' => 3, 'name' => 'Dell XPS 13', 'description' => 'Intel Core i7, 16GB RAM, 512GB SSD', 'image' => 'product-3.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 3],
            ['id' => 4, 'name' => 'Asus Vivobook 15', 'description' => 'AMD Ryzen 5, 8GB RAM, 512GB SSD', 'image' => 'product-4.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 4],
            ['id' => 5, 'name' => 'HP Pavilion 15', 'description' => 'Intel Core i5, 8GB RAM, 512GB SSD', 'image' => 'product-5.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 5],
            ['id' => 6, 'name' => 'Lenovo Legion 5', 'description' => 'AMD Ryzen 7, RTX 4060, 16GB RAM', 'image' => 'product-6.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 6],
            ['id' => 7, 'name' => 'Acer Nitro 5', 'description' => 'Intel Core i7, RTX 3050, 16GB RAM', 'image' => 'product-7.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 7],
            ['id' => 8, 'name' => 'LG Gram 17', 'description' => 'Intel Core i7, 16GB RAM, 1TB SSD', 'image' => 'product-8.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 8],
            ['id' => 9, 'name' => 'Huawei MateBook D15', 'description' => 'Intel Core i5, 8GB RAM, 512GB SSD', 'image' => 'product-9.jpg', 'status' => 1, 'isDeleted' => 0, 'CatId' => 9],
        ];

        DB::table('products')->insert($products);
    }
}
