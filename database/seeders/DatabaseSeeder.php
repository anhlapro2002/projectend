<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProvinceSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
            CategorySeeder::class,
            RamSeeder::class,
            RomSeeder::class,
            CpuSeeder::class,
            GPUSeeder::class,
            PaymentmethodSeeder::class,
            ShippingUnitSeeder::class,
            ProductsSeeder::class,
            ProductsDetailSeeder::class,
            UsersSeeder::class,
            EmployeeSeeder::class,
            CustomerSeeder::class,
            OrdersSeeder::class,
            OrderDetailSeeder::class,
        ]);
    }
}
