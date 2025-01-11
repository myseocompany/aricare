<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $path = database_path('seeders/data/cups.csv');
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
                'id' => $row[0],
                'CODIGO_CUPS' => $row[1],
                'NOMBRE_CUPS' => $row[2],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $counter++;

            if ($counter === $batchSize) {
                DB::table('cups')->insert($data);
                $data = [];
                $counter = 0;
            }
        }

        // Inserta los datos restantes
        if (!empty($data)) {
            DB::table('cups')->insert($data);
        }

        fclose($handle);
    }
}
