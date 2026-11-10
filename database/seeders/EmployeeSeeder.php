<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            ['id' => 4, 'name' => 'Lê Văn C', 'email' => 'c.le@shop.com', 'phone' => '0901000004', 'password' => Hash::make('employee123'), 'address' => '4 Nghĩa Đô', 'role' => 1, 'WardId' => 5],
            ['id' => 5, 'name' => 'Phạm Thị D', 'email' => 'd.pham@shop.com', 'phone' => '0901000005', 'password' => Hash::make('employee123'), 'address' => '5 Mai Dịch', 'role' => 1, 'WardId' => 6],
        ];

        DB::table('user')->insert($employees);
    }
}
