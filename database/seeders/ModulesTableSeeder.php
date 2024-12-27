<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['name' => 'agenda', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pacientes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'usuarios', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'configuracion', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'reportes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'facturación', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('modules')->insert($modules);
    }
}
