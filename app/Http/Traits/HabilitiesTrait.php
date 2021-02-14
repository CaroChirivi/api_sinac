<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

trait HabilitiesTrait{
    
    public function getFathers(){
        $user = Auth::user();
        $fathers = Menu::select("menus.*")
                ->join('habilities', 'habilities.menu_id', '=', 'menus.id')
                ->where('habilities.rol_id', '=', $user->rol_id)
                ->whereNull('menus.menu_id')
                ->get();
        return $fathers;
    }

    function getChildren(){
        $user = Auth::user();
        $children = Menu::select("menus.*")
                    ->join('habilities', 'habilities.menu_id', '=', 'menus.id')
                    ->where('habilities.rol_id', '=', $user->rol_id)
                    ->whereNotNull('menus.menu_id')
                    ->get();
        return $children;
    }

    function getQuickAccess(){
        $user = Auth::user();
        $quickAccess = Menu::select("menus.*")
                    ->join('habilities', 'habilities.menu_id', '=', 'menus.id')
                    ->where('habilities.rol_id', '=', $user->rol_id)
                    ->where('menus.direct_access', true)
                    ->orderBy('menus.id')
                    ->get();
        return $quickAccess;
    }

}