<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $token = JWTAuth::fromUser($this->resource);

        return [
            'name' => $this->name,
            'email' => $this->email,
            'token' => $token,
            // Puedes incluir también la fecha de expiración si es necesario
            'expires_at' => JWTAuth::setToken($token)->getPayload()->get('exp')
        ];
    }
}
