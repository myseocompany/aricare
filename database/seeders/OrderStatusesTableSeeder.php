<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_statuses')->insert([
            ['name' => 'Pending', 'color' => '#ff9900', 'weight' => 1, 'status_id' => 1],
            ['name' => 'Processing', 'color' => '#3366ff', 'weight' => 2, 'status_id' => 1],
            ['name' => 'Completed', 'color' => '#33cc33', 'weight' => 3, 'status_id' => 1],
            ['name' => 'Cancelled', 'color' => '#cc0000', 'weight' => 4, 'status_id' => 1],
        ]);
    }
}
