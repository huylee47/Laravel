<?php

namespace App\Http\Controllers;

use App\Services\admin\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $LoginService;

    public function __construct(LoginService $LoginService)
    {
        $this->LoginService= $LoginService;
    }
    // public function login(Request $request){
    //     $loginResult = $this->LoginService->loginAuth($request);
    //     if (isset($loginResult['success']) && $loginResult['success']) {
    //         $account = Auth::user();
    //         $token = $account->createToken('authToken')->plainTextToken; // Tạo token
    //         return response()->json(['token' => $token, 'role' => $loginResult['role']]);
    //     }
    
    //     return response()->json($loginResult); // Trả về kết quả
    //     // return response()->json($loginResult);
    // }
    }

