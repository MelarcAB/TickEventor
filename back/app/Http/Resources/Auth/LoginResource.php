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
        $user = ($this->resource['user']);
        $token = ($this->resource['token']);
        return [
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'token' => $token
        ];
    }
}
