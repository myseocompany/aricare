<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeRangesSeeder extends Seeder
{
    public function run(): void
    {
        $ranges = [
            '1-3',
            '3-6',
            '6-10',
            '+de 10',
        ];

        foreach ($ranges as $range) {
            DB::table('employee_ranges')->updateOrInsert(
                ['range' => $range],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
