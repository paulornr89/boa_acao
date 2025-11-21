<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LoginStatefullController extends LoginController
{
    public function login(LoginRequest $request): JsonResource | JsonResponse {
        try {
            $credentials = $request->validated();
            $user = $this->authenticate($credentials);
            if(!$user) {
                throw new Exception("Dados Inválidos");
            }
            return (new UserResource($user))
            ->additional(["message" => "Logado via Sessão!!"]);
        } catch(Exception $error) {
             return $this->errorHandler(
                $error->getMessage(),
                $error,
                401
            );
        }
    }

    public function logout(Request $request): JsonResponse {
        $user = Auth::guard('web')->user();
        if(!$user) {
            return response()->json(["message" => "Não autenticado!"], 401);
        }
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(["message" => "Sessão encerrada!!!"]);
    }
}
