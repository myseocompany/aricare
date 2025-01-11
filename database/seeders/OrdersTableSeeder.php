<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'customer_id' => 1,
                'product_id' => 1,
                'invoice_id' => 1,
                'quantity' => 2,
                'price' => 100.00,
                'discounts' => 10.00,
                'shippingCharges' => 5.00,
                'IVA' => 21.00,
                'status_id' => 1,
                'user_id' => 1,
                'delivery_name' => 'John Doe',
                'delivery_email' => 'johndoe@example.com',
                'delivery_address' => '123 Main St',
                'delivery_phone' => '123456789',
                'delivery_date' => Carbon::now()->addDays(3),
                'notes' => 'Deliver between 9 AM and 5 PM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('orders')->insert([
            [
                'customer_id' => 5,
                'product_id' => 1,
                'invoice_id' => 1,
                'quantity' => 2,
                'price' => 100.00,
                'discounts' => 10.00,
                'shippingCharges' => 5.00,
                'IVA' => 21.00,
                'status_id' => 1,
                'user_id' => 1,
                'delivery_name' => 'John Doe',
                'delivery_email' => 'johndoe@example.com',
                'delivery_address' => '123 Main St',
                'delivery_phone' => '123456789',
                'delivery_date' => Carbon::now()->addDays(3),
                'notes' => 'Deliver between 9 AM and 5 PM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
