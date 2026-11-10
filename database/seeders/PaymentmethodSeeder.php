<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentmethodSeeder extends Seeder
{
    public function run()
    {
        $methods = [
            ['id' => 1, 'name' => 'BankTransfer', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'COD', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'CreditCard', 'isDeleted' => 0],
        ];

        DB::table('paymentmethods')->insert($methods);
    }
}
