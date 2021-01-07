<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){  
        Log::info($request);
        try {    
            // $request->validate([      
            //         'name' => 'required',      
            //         'password' => 'required'    
            // ]);    
            $validator = \Validator::make($request->all(), [
                'name' => ['required'],
                'password' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json(['resultado' => 'NoOk', 'errors'=>$validator->errors()->all()]); 
            }
            
            $credentials = request(['name', 'password']);    
            
            if (!Auth::attempt($credentials)) {      
                return response()->json([        
                                    'status_code' => 500,        
                                    'message' => 'Unauthorized'      
                                ]);    
            }    
            
            $user = User::where('user', $request->email)->first();    
            
            if ( ! Hash::check($request->password, $user->password, [])) {       
                throw new \Exception('Error in Login');    
            }    
            
            $tokenResult = $user->createToken('authToken')->plainTextToken;    
            return response()->json([      
                'status_code' => 200,      
                'access_token' => $tokenResult,      
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