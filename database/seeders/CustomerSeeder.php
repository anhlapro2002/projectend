<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $wards = DB::table('wards')->pluck('id')->toArray();

        $lastNames = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Phan', 'Vũ', 'Võ', 'Đặng', 'Bùi', 'Đỗ', 'Hồ', 'Ngô', 'Dương', 'Lý'];
        $firstNames = ['An', 'Bình', 'Cường', 'Dung', 'Hà', 'Hùng', 'Linh', 'Mai', 'Nam', 'Ngọc', 'Phong', 'Quân', 'Sơn', 'Thảo', 'Tú', 'Vy', 'Xuân', 'Yến', 'Khánh', 'Trang', 'Đức', 'Hiếu', 'Khoa', 'Lan', 'Nhung', 'Oanh', 'Phi', 'Quỳnh', 'Sang', 'Thủy'];

        $users = [];
        $id = 6;
        for ($i = 0; $i < 40; $i++) {
            $name = $lastNames[$i % count($lastNames)] . ' ' . $firstNames[($i * 7) % count($firstNames)] . ' ' . ($i + 1);
            $users[] = [
                'id' => $id,
                'name' => $name,
                'email' => 'customer' . $id . '@gmail.com',
                'phone' => '09' . str_pad($id, 8, '0', STR_PAD_LEFT),
                'password' => Hash::make('customer123'),
                'address' => ($id * 10) . ' Đường ABC, Quận XYZ',
                'role' => 2,
                'WardId' => $wards[array_rand($wards)],
            ];
            $id++;
        }

        DB::table('user')->insert($users);
    }
}
