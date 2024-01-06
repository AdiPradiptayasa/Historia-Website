<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator; 


class AuthController extends Controller
{   
    public function register(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'              
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Terdapat kesalahan',
                    'errors'=>$validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status'=>true,
                'message'=>'Register Berhasil',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        }catch(\Throwable $th){
            return response()->json([
                'status'=> false,
                'message'=>$th->getMessage()
            ], 500);
        }    
    }
     
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken; // Perbaikan typo plaintTextToken

        return response()->json([
            'success' => true,
            'message' => 'success',
            'user'=>$user,
            'token' => $token,
        ], 200);
    }
}