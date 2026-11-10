<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $category = [
                ['id' => 1, 'name' => 'MACBOOK', 'isDeleted' => 0],
                ['id' => 2, 'name' => 'MSI', 'isDeleted' => 0],
                ['id' => 3, 'name' => 'DELL', 'isDeleted' => 0],
                ['id' => 4, 'name' => 'ASUS', 'isDeleted' => 0],
                ['id' => 5, 'name' => 'HP', 'isDeleted' => 0],
                ['id' => 6, 'name' => 'LENOVO', 'isDeleted' => 0],
                ['id' => 7, 'name' => 'ACER', 'isDeleted' => 0],
                ['id' => 8, 'name' => 'LG', 'isDeleted' => 0],
                ['id' => 9, 'name' => 'HUAWEI', 'isDeleted' => 0],
                ['id' => 10, 'name' => 'RAZER', 'isDeleted' => 0]
            ];
    
            DB::table('category')->insert($category);
        }
    }
}
