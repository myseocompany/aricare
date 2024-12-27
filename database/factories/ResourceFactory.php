<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\ResourceType;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    protected $model = Resource::class;

    public function definition()
    {   
        $resourceType = ResourceType::inRandomOrder()->first() ?? ResourceType::factory()->create();

        return [
            'name' => $this->faker->word(),
            'branch_id' => \App\Models\Branch::factory(), // Relacionar con una sucursal
            'type_id' => $resourceType->id, // Relacionar con un tipo de recurso
            'multi_patient' => $this->faker->boolean(), // Permitir múltiples pacientes
        ];
    }
}
