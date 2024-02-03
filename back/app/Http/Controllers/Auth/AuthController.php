<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

use Laravel\Socialite\Facades\Socialite;
use App\Repositories\User\Contracts\UserRepositoryInterface;

class AuthController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            if (!auth()->attempt($credentials)) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }
            $user = auth()->user();
            return response()->json([
                'message' => 'User logged in successfully',
                'data' => new LoginResource($user),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }

    }


    function register(RegisterRequest $request)
    {
        try {
            $credentials = $request->validated();
           // $user = \App\Models\User::create($credentials);

            $user = $this->userRepository->register($credentials);
            return response()->json([
                'message' => 'User registered successfully',
                'data' => new RegisterResource($user),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Estas funciones de OAuth son para el login con Google
     * solo se usan para redireccionar a la pagina de google y comunicarse con ella para obtener el token y enviarlo al front
     */
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google and send it to the front.
     *
     * @return \Illuminate\Http\Response
     */
    function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $user = User::firstOrCreate([
                'email' => $user->email
            ], [
                'name' => $user->name,
                'password' => bcrypt('12345678')
            ]);
            $token = JWTAuth::fromUser($user);
            $redirect_url = env("FRONT_URL") . "/auth/google/callback" . "?token=" . $token;
            return redirect($redirect_url);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
