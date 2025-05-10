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
        ['code' => 'A1', 'description' => 'Motocicletas hasta 250cc'],
        ['code' => 'A2', 'description' => 'Motocicletas mayores a 250cc'],
        ['code' => 'B1', 'description' => 'Automóviles particulares'],
        ['code' => 'B2', 'description' => 'Vehículos de carga menores a 3.5 toneladas'],
        ['code' => 'C', 'description' => 'Vehículos de transporte público'],
        ['code' => 'D', 'description' => 'Buses urbanos e interurbanos'],
        ['code' => 'E', 'description' => 'Vehículos articulados o remolques'],
        ['code' => 'F', 'description' => 'Máquinas agrícolas y construcción'],
        ['code' => 'G', 'description' => 'Motos acuáticas'],
        ['code' => 'H', 'description' => 'Licencia para instructores'],
        ['code' => 'I', 'description' => 'Licencia internacional'],
        ['code' => 'J', 'description' => 'Licencia para vehículos históricos'],
        ['code' => 'K', 'description' => 'Licencia para vehículos eléctricos'],
        ['code' => 'L', 'description' => 'Licencia para bicicletas motorizadas'],
        ['code' => 'M', 'description' => 'Licencia para cuatrimotos'],
        ['code' => 'N', 'description' => 'Licencia para motocarros'],
        ['code' => 'O', 'description' => 'Licencia para drones'],
        ['code' => 'P', 'description' => 'Licencia para embarcaciones menores'],
        ['code' => 'Q', 'description' => 'Licencia para aeronaves'],
        ['code' => 'R', 'description' => 'Licencia para vehículos de emergencia'],
        ['code' => 'S', 'description' => 'Licencia para vehículos de competición'],
        ['code' => 'T', 'description' => 'Licencia para taxis'],
        ['code' => 'U', 'description' => 'Licencia para conductores de transporte escolar'],
        ['code' => 'V', 'description' => 'Licencia para vehículos eléctricos de alta potencia'],
        ['code' => 'W', 'description' => 'Licencia para vehículos de reparto urbano'],
        ['code' => 'X', 'description' => 'Licencia para vehículos de recolección de residuos'],
        ['code' => 'Y', 'description' => 'Licencia para vehículos de servicios públicos domiciliarios'],
        ['code' => 'Z', 'description' => 'Licencia para vehículos especiales no convencionales'],
    ];

    DB::table('license_types')->insert($types);
}
}
