<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            ['name' => "Administradora", 
            "description" => "Acceso total al sistema. Modulo de usuario. Administración de programas. Generación de reportes"],//1
            ['name' => "Secretaria", 
            "description" => "Acceso a información de estudiantes y registro de pagos"]
        ]);
    }
}
