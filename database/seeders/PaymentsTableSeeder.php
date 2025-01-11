<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            ['name' => 'Credit Card'],
            ['name' => 'PayPal'],
            ['name' => 'Bank Transfer'],
            ['name' => 'Cash on Delivery'],
        ]);
    }
}
