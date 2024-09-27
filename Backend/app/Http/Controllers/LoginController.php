<?php

namespace App\Http\Controllers;

use App\Services\admin\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }


    public function login(Request $request) {
        $loginResult = $this->loginService->loginAuth($request);
    
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
    
}
