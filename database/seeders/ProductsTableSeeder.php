<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'project_id' => 1,
            'name' => 'Product 1',
            'reference' => 'REF001',
            'price' => 100,
            'quantity' => 50,
            'category_id' => 1,
            'category_code' => 'CAT001',
            'type_id' => 1,
            'status_id' => 1,
            'location' => 'Warehouse A',
            'notes' => 'Sample product 1 notes.',
            'image_url' => 'https://example.com/images/product1.jpg',
        ]);

        Product::create([
            'project_id' => 2,
            'name' => 'Product 2',
            'reference' => 'REF002',
            'price' => 200,
            'quantity' => 30,
            'category_id' => 2,
            'category_code' => 'CAT002',
            'type_id' => 2,
            'status_id' => 2,
            'location' => 'Warehouse B',
            'notes' => 'Sample product 2 notes.',
            'image_url' => 'https://example.com/images/product2.jpg',
        ]);

        Product::create([
            'project_id' => 3,
            'name' => 'Product 3',
            'reference' => 'REF003',
            'price' => 150,
            'quantity' => 20,
            'category_id' => 3,
            'category_code' => 'CAT003',
            'type_id' => 3,
            'status_id' => 3,
            'location' => 'Warehouse C',
            'notes' => 'Sample product 3 notes.',
            'image_url' => 'https://example.com/images/product3.jpg',
        ]);
    }
}