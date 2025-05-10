<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenseType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            // Categoría A: Motocicletas
            ['code' => 'A1', 'description' => 'Motocicletas con cilindrada de hasta 125 cc'],
            ['code' => 'A2', 'description' => 'Motocicletas, motociclos y mototriciclos con cilindrada superior a 125 cc'],

            // Categoría B: Vehículos de servicio particular
            ['code' => 'B1', 'description' => 'Automóviles, motocarros, cuatrimotos, camperos, camionetas y microbuses de servicio particular'],
            ['code' => 'B2', 'description' => 'Camiones rígidos, busetas y buses de servicio particular'],
            ['code' => 'B3', 'description' => 'Vehículos articulados de servicio particular'],

            // Categoría C: Vehículos de servicio público
            ['code' => 'C1', 'description' => 'Automóviles, camperos, camionetas y microbuses de servicio público'],
            ['code' => 'C2', 'description' => 'Camiones rígidos, busetas y buses de servicio público'],
            ['code' => 'C3', 'description' => 'Vehículos articulados de servicio público'],
        ];

        DB::table('license_types')->insert($types);
    }
}
