<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Models\Team;

class AuthController extends Controller
{
    public function login(LoginRequest $request){  
        Log::info($request);
        try {         
            $credentials = request(['user', 'password']);    
            
            if (Auth::attempt($credentials)) {    
                $user = Auth::user();
                //$token = $user->createToken('authToken')->plainTextToken; 
                //return $user->createToken('token-name', ['server:update'])->plainTextToken;

                // if ($user->tokenCan('server:update')) {
                //     //
                // }
                
                Log::info($user);
                $team_member = Team::find($user->team_id);
                Log::info($team_member);
                return response()->json([      
                    'status' => 200,      
                    'token' => $user->createToken('authToken')->plainTextToken,    
                    'user' => ["name" => $team_member->full_name, "email" => $user->email]
                    //'token_type' => 'Bearer',    
                ]);  
            }   
            
            return new JsonResponse([
                'message' => 'La información de usuario y contraseña no es correcta',
                'errors' => '',
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ], Response::HTTP_UNPROCESSABLE_ENTITY); 
            
            
        } catch (Exception $error) {    
            return response()->json([      
                'status_code' => 500,      
                'message' => 'Error in Login',      
                'error' => $error,    
            ]);  
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::guard('web')->logout();

        return response()->json([      
            'status' => 200,      
            'message' => "Sesión finalizada exitosamente"  
        ]); 
    }
}