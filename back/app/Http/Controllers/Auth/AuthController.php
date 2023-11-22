<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
//LoginResource
use App\Http\Resources\Auth\LoginResource;
//RegisterResource
use App\Http\Resources\Auth\RegisterResource;

use App\Models\User;

//Socialite
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    
    function login(LoginRequest $request){
        try{
            $credentials = $request->validated();
            if(!auth()->attempt($credentials)){
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }
            $user = auth()->user();
            return response()->json([
                'message' => 'User logged in successfully',
                'data' => new LoginResource($user),
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }

    }


    function register(RegisterRequest $request){
        try{
            $credentials = $request->validated();
            $credentials['password'] = bcrypt($credentials['password']);
            $user = \App\Models\User::create($credentials);
            return response()->json([
                'message' => 'User registered successfully',
                'data' => new RegisterResource($user),
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }

    }



    function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            $user = User::firstOrCreate([
                'email' => $user->email
            ], [
                'name' => $user->name,
                'password' => bcrypt('12345678')
            ]);
            $redirect_url = env("FRONT_URL")."/auth/google/callback"."?token=".$user->createToken('auth_token')->plainTextToken;
            return redirect($redirect_url);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
