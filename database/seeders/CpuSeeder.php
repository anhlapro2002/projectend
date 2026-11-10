<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CpuSeeder extends Seeder
{
    public function run()
    {
        $cpus = [
            ['id' => 1, 'name' => 'Intel Core i5', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'Intel Core i7', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'Intel Core i9', 'isDeleted' => 0],
            ['id' => 4, 'name' => 'AMD Ryzen 5', 'isDeleted' => 0],
            ['id' => 5, 'name' => 'AMD Ryzen 7', 'isDeleted' => 0],
            ['id' => 6, 'name' => 'Apple M1', 'isDeleted' => 0],
            ['id' => 7, 'name' => 'Apple M2', 'isDeleted' => 0],
        ];

        DB::table('cpu')->insert($cpus);
    }
}
