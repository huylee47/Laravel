<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\admin\LoginService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    // login controller
    public function login(LoginRequest $request) {
        $loginResult = $this->loginService->loginAuth($request);
        // send the login result
        if ($loginResult['success']) {
            return response()->json([
                'token' => $loginResult['token'],
                'role' => $loginResult['role']
            ], 200); 
        }
    
        return response()->json([
            'error' => $loginResult['error']
        ], 401); 
    }

    // logout controller
    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully.'], 200);
    }
    
}
