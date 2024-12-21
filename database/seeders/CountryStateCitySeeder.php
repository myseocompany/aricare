<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountryStateCitySeeder extends Seeder
{
    private function processCountry($country)
{
    if (!is_array($country)) {
        logger("Invalid country data: " . json_encode($country));
        return;
    }

    if (empty($country['name']) || empty($country['iso2'])) {
        logger("Country skipped due to missing data: " . json_encode($country));
        return;
    }

    logger("Processing country: " . $country['name']);

    // Verificar si el país ya existe
    $existingCountry = DB::table('countries')->where('name', $country['name'])->first();

    if ($existingCountry) {
        logger("Country already exists, skipping: " . $country['name']);
        $countryId = $existingCountry->id;
    } else {
        $countryId = DB::table('countries')->insertGetId([
            'name' => $country['name'],
            'iso_code' => $country['iso2'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    if (!empty($country['states'])) {
        foreach ($country['states'] as $state) {
            $this->processState($state, $countryId);
        }
    }
}



private function processState($state, $countryId)
{
    if (empty($state['name'])) {
        logger("State skipped due to missing data: " . json_encode($state));
        return;
    }

    logger("Processing state: " . $state['name']);

    $stateId = DB::table('divisions')->insertGetId([
        'country_id' => $countryId,
        'name' => $state['name'],
        'code' => $state['state_code'] ?? null,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    if (!empty($state['cities'])) {
        foreach ($state['cities'] as $city) {
            $this->processCity($city, $stateId);
        }
    }
}

private function processCity($city, $stateId)
{
    if (empty($city['name'])) {
        logger("City skipped due to missing data: " . json_encode($city));
        return;
    }

    logger("Processing city: " . $city['name']);

    DB::table('cities')->insert([
        'division_id' => $stateId,
        'name' => $city['name'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}


public function run()
{
    // Vaciar la tabla countries antes de iniciar


    // Ruta del archivo JSON
    //$jsonPath = database_path('seeders/data/countries+states+cities.json');
    $jsonPath = database_path('seeders/data/colombia_states_cities.json');
    
    
    // Verifica si el archivo existe
    if (!File::exists($jsonPath)) {
        logger("JSON file not found at path: " . $jsonPath);
        return;
    }

    // Leer y decodificar JSON
    $json = File::get($jsonPath);
    $countries = json_decode($json, true);

    // Verifica si la decodificación fue exitosa
    if (is_null($countries)) {
        logger("Failed to decode JSON. Check the file format.");
        return;
    }

    // Procesar cada país
    foreach ($countries as $country) {
        $this->processCountry($country);
    }
}


}