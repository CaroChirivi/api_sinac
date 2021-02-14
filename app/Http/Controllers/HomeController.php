<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Http\Traits\HabilitiesTrait;

class HomeController extends Controller
{

    use HabilitiesTrait;

    function quickButtons() {
        // $fathers = $this->getFathers();
        //$children = $this->getChildren();
        $quickAccess = $this->getQuickAccess();
        // Log::info($fathers);
        // Log::info($children);
        Log::info($quickAccess);
        return response()->json([      
            'status' => 200,      
            'quickButtons' => $quickAccess,
            //'token_type' => 'Bearer',    
        ]);  
    }
}
