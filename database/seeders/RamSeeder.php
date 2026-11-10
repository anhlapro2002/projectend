<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamSeeder extends Seeder
{
    public function run()
    {
        $rams = [
            ['id' => 1, 'name' => 'DDR3 4GB', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'DDR3 8GB', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'DDR4 4GB', 'isDeleted' => 0],
            ['id' => 4, 'name' => 'DDR4 8GB', 'isDeleted' => 0],
            ['id' => 5, 'name' => 'DDR4 16GB', 'isDeleted' => 0],
            ['id' => 6, 'name' => 'DDR5 16GB', 'isDeleted' => 0],
            ['id' => 7, 'name' => 'DDR5 32GB', 'isDeleted' => 0],
            ['id' => 8, 'name' => 'SDRAM 2GB', 'isDeleted' => 0],
            ['id' => 9, 'name' => 'SDRAM 4GB', 'isDeleted' => 0],
            ['id' => 10, 'name' => 'GDDR6 8GB', 'isDeleted' => 0],
        ];

        DB::table('ram')->insert($rams);
    }
}
