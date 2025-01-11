<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cie10Seeder extends Seeder
{
    public function run()
    {
        $path = database_path('seeders/data/cie10.csv');
        $handle = fopen($path, 'r');

        if ($handle === false) {
            throw new Exception("No se pudo abrir el archivo $path");
        }

        // Leer encabezado del CSV
        $header = fgetcsv($handle, 0, ',');

        $data = [];
        $batchSize = 500; // Inserciones por lote
        $counter = 0;

        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $data[] = [
                'code' => $row[0],
                'name' => $row[1],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $counter++;

            if ($counter === $batchSize) {
                DB::table('cie10')->insert($data);
                $data = [];
                $counter = 0;
            }
        }

        // Inserta los datos restantes
        if (!empty($data)) {
            DB::table('cie10')->insert($data);
        }

        fclose($handle);
    }
}
