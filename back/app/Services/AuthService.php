<?php
namespace App\Services;

use App\Repositories\User\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AuthService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(array $data)
    {
        //Encrypt password
        $data['password'] = bcrypt($data['password']);
        return $this->userRepository->register($data);
    }

    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return [
                'user' =>   $user,
                'token' =>  $this->generateJWT($user)
            ];
        }
        return null;
    }


    /**
     * Genera un token JWT para un usuario dado.
     *
     * @param  \App\Models\User  $user
     * @return string
     */
    public static function generateJWT($user): string
    {
        return JWTAuth::fromUser($user);
    }



}
