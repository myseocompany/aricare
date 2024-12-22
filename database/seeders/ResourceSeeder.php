<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $branches = Branch::all();
        $resourceTypes = ResourceType::all();

        foreach ($branches as $branch) {
            // Generar un número aleatorio de recursos por sucursal
            $resourceCount = rand(2, 5);

            for ($i = 0; $i < $resourceCount; $i++) {
                $resourceType = $resourceTypes->random();

                Resource::create([
                    'branch_id' => $branch->id,
                    'type_id' => $resourceType->id,
                    'name' => $resourceType->name . ' ' . ($i + 1),
                    'type' => $resourceType->name,
                    'description' => $resourceType->description,
                    'multi_patient' => (bool)rand(0, 1),
                ]);
            }
        }
    }
}
