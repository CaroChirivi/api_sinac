<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'cedula' => "52929077", 
                'name' => "Diana Carolina", 
                'last_name' => "Tarapues Chirivi", 
                'phone1' => "321 4021654", 
                'phone2' => "321 2047527", 
                'email' => "carotarapues@gmail.com", 
                'enabled' => 1
            ]
        ]);
    }
}
