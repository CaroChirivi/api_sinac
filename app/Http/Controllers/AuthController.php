<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){  
        Log::info($request);
        try {         
            $credentials = request(['user', 'password']);    
            
            if (!Auth::attempt($credentials)) {    
                Log::info("Intenta conectarse"); 
                return new JsonResponse([
                    'message' => 'La información de usuario y contraseña no es autorizada',
                    'errors' => ''
                ], Response::HTTP_UNPROCESSABLE_ENTITY); 
                // return response()->json([        
                //                     'status_code' => 500,        
                //                     'message' => 'Unauthorized'      
                //                 ]);    
            }    
            
            $user = User::where('user', $request->user)->first();    
            
            // if ( ! \Hash::check($request->password, $user->password, [])) {       
            //     throw new \Exception('Error in Login');    
            // }    
            
            $tokenResult = $user->createToken('authToken')->plainTextToken;    
            return response()->json([      
                'status_code' => 200,      
                'token' => $tokenResult,      
                'token_type' => 'Bearer',    
            ]);  
        } catch (Exception $error) {    
            return response()->json([      
                'status_code' => 500,      
                'message' => 'Error in Login',      
                'error' => $error,    
            ]);  
        }
    }
}