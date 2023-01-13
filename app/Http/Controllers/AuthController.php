<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;

class AuthController extends Controller{

    public function login(LoginRequest $request){
        $credentials = request(['email','password']);
        $user = User::where('email',$request->email)->first();
        if(!auth()->attempt($credentials)){
            return $this->unauthenticated('password');
        }
        return $this->sendResponse(
            [
                'access_token' => $user->createToken('auth-token')->plainTextToken
            ],
            "User successfully authenticated"
        );
    }

    public function me(){
        $user = auth('sanctum')->user();
        if($user)
            return $this->sendResponse(new UserResource($user));
        return $this->unauthenticated();
    }

    private function unauthenticated($password = null){
        if($password)
            return $this->sendError(
                [
                    'password' => [
                        'Invalid credentials'
                    ]
                ],
                'The given data was invalid',
                401
            );
        return $this->sendError(
            "Access token not provided or invalid access token",
            'Unauthenticated',
            403
        );    
    }
    
}
