<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($data)) {
            $token = Auth::user()->createToken(env('APP_NAME'))->plainTextToken;
            return response()->json(['token' => $token], Response::HTTP_OK);
        } else {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
