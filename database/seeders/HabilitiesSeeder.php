<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class HabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Rol management*/
        for($i = 1; $i <= 11; $i++){
            DB::table('habilities')->insert([
                ['rol_id' => "1", "menu_id" => $i, "create" => 1, "delete" => 1, 
                "show" => 1, "update" => 1]
            ]);
        }
    }
}
