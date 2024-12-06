<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['name' => 'Cédula de Ciudadanía', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tarjeta de Identidad', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pasaporte', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cédula de Extranjería', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($documentTypes as $type) {
            DB::table('document_types')->updateOrInsert(
                ['name' => $type['name']],
                ['created_at' => $type['created_at'], 'updated_at' => $type['updated_at']]
            );
        }
    }
}