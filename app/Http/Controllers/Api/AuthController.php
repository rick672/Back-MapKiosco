<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');

        $token = auth('api')->attempt($credenciales);

        if(empty($token)){
            return response()->json(['error' => 'Credenciales incorrectas'], 422);
        }

        $user = auth('api')->user();
        $user->load('rol');

        $ttlOriginal = JWTAuth::factory()->getTTL();
        JWTAuth::factory()->setTTL(60);
        $refreshToken = JWTAuth::claims(['type' => 'refresh'])->fromUser($user);
        JWTAuth::factory()->setTTL($ttlOriginal);
        
        unset($user->password, $user->id);

        return response()->json([
            'access_token'=>$token,
            'user'=>$user,
        ])->cookie(
            'refresh_token',
            $refreshToken,
            60, // Expiración en minutos
            '/', // Ruta (ajusta según tu configuración)
            'null', // Dominio (ajusta según tu configuración)
            false, // No es seguro (no HTTPS)
            true,  // Solo accesible por HTTP (no JavaScript)
            false, // No es de solo lectura
            'Lax',  // Laxación de la seguridad
        );
    }
}
