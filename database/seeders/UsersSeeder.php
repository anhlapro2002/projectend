<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@shop.com', 'phone' => '0901000001', 'password' => Hash::make('admin123'), 'address' => '1 Trần Hưng Đạo', 'role' => 0, 'WardId' => 3],
            ['id' => 2, 'name' => 'Nguyễn Văn A', 'email' => 'a.nguyen@shop.com', 'phone' => '0901000002', 'password' => Hash::make('employee123'), 'address' => '2 Kim Ngưu', 'role' => 1, 'WardId' => 3],
            ['id' => 3, 'name' => 'Trần Thị B', 'email' => 'b.tran@shop.com', 'phone' => '0901000003', 'password' => Hash::make('employee123'), 'address' => '3 Hàng Bạc', 'role' => 1, 'WardId' => 3],
        ];

        DB::table('user')->insert($users);
    }
}
