<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;

class LoginTokensController extends LoginController
{
    public function login(LoginRequest $request) {
        try {
            $user = $this->authenticate($request->validated());
            if(!$user) throw new Exception("Dados Inválidos!");
                $token = $user->createToken($user->email)->plainTextToken;
                return compact('token', 'user');
        }catch(Exception $error) {
            return $this->errorHandler($error->getMessage(),$error,401);
        }
    }
}
