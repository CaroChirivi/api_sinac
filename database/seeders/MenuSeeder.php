<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'description' => "Home", 
                "url" => "/", 
                "route" => "home",
                'menu_id' => null, 
                'icon' => 'fa-home', 
                'direct_access' => 0, 
                'direct_access_image' => null, 
                'draw' => 1
            ],//1
            [
                'description' => "Usuarios", 
                "url" => null, 
                "route" => null,
                'menu_id' => null, 
                'icon' => 'fa-users', 
                'direct_access' => 0, 
                'direct_access_image' => null, 
                'draw' => 1
            ],//2
            [
                'description' => "Lista usuarios", 
                "url" => 'users', 
                "route" => 'users',
                'menu_id' => 2, 
                'icon' => null, 
                'direct_access' => 0, 
                'direct_access_image' => null, 
                'draw' => 1
            ],
            [
                'description' => "Permisos", 
                "url" => 'habilities', 
                "route" => 'habilities',
                'menu_id' => 2, 
                'icon' => null, 
                'direct_access' => 0, 
                'direct_access_image' => null, 
                'draw' => 1
            ],
            [
                'description' => "Estudiantes", 
                "url" => 'students', 
                "route" => 'students',
                'menu_id' => null, 
                'icon' => 'fa-users', 
                'direct_access' => 1, 
                'direct_access_image' => 'person_search_peque.png', 
                'draw' => 1
            ],//5
            [
                'description' => "Programas", 
                "url" => null, 
                "route" => null,
                'menu_id' => null, 
                'icon' => 'fa-users', 
                'direct_access' => 0, 
                'direct_access_image' => null, 
                'draw' => 1
            ],//6
            [
                'description' => "Programas", 
                "url" => 'programs', 
                "route" => 'programs',
                'menu_id' => 6, 
                'icon' => 'fa-users', 
                'direct_access' => 1, 
                'direct_access_image' => 'professions.png', 
                'draw' => 1
            ],
            [
                'description' => "Categorias", 
                "url" => 'categories', 
                "route" => 'categories',
                'menu_id' => 6, 
                'icon' => 'fa-users', 
                'direct_access' => 0, 
                'direct_access_image' => null, 
                'draw' => 1
            ],
            [
                'description' => "Pagos", 
                "url" => 'payments', 
                "route" => 'payments',
                'menu_id' => null, 
                'icon' => 'fa-users', 
                'direct_access' => 1, 
                'direct_access_image' => 'payments.png', 
                'draw' => 1
            ],//9
            [
                'description' => "Reportes", 
                "url" => 'reports', 
                "route" => 'reports',
                'menu_id' => null, 
                'icon' => 'fa-users', 
                'direct_access' => 1, 
                'direct_access_image' => 'report.png', 
                'draw' => 1
            ],
            [
                'description' => "Plataformas", 
                "url" => 'platforms', 
                "route" => 'platforms',
                'menu_id' => null, 
                'icon' => 'fa-users', 
                'direct_access' => 1, 
                'direct_access_image' => 'platforms.png', 
                'draw' => 1
            ],
        ]);
    }
}
