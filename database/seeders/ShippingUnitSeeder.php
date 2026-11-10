<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingUnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['id' => 1, 'name' => 'Viettel Post', 'URL' => 'http://viettelpost.com.vn', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'Giao Hang Nhanh', 'URL' => 'https://ghn.vn', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'Giao Hang Tiet Kiem', 'URL' => 'https://ghtk.vn', 'isDeleted' => 0],
        ];

        DB::table('shippingunits')->insert($units);
    }
}
