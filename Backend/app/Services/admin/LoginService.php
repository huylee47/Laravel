<?php 
namespace App\Services\admin;

use App\Models\Accounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginService {
    // public function loginAuth(Request $request) {
    //     $request->validate([
    //         'username' => 'required|string|max:255',
    //         'password' => 'required|string',
    //     ]);

    //     $account = Accounts::where('username', $request->input('username'))->first();

    //     if (!$account) {
    //         return response()->json(['error' => 'Username is incorrect.'], 401);
    //     }

    //     if (!Hash::check($request->input('password'), $account->password)) {
    //         return response()->json(['error' => 'Password is incorrect.'], 401);
    //     }

    //     if ($account->role == 1) {
    //         Auth::login($account);
    //         return response()->json(['role' => 'User']);
    //     } elseif ($account->role == 0) {
    //         Auth::login($account);
    //         return response()->json(['role' => 'Admin']);
    //     } else {
    //         Auth::logout();
    //         return response()->json(['error' => 'You are banned.'], 403);
    //     }   
    // }
    public function loginAuth(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
    
        $account = Accounts::where('username', $request->input('username'))->first();
    
        if (!$account) {
            return ['success' => false, 'error' => 'Username is incorrect.'];
        }
    
        if (!Hash::check($request->input('password'), $account->password)) {
            return ['success' => false, 'error' => 'Password is incorrect.'];
        }
        Auth::login($account);
        /** @var \App\Models\Accounts $user **/  $user = Auth::user();
        switch($user->role){
            case 0:
                $user->token = $account->createToken('authToken',  ['ability:admin'])->plainTextToken; 
                return ['success' => true, 'token' => $user, 'role' => 'Admin'];
            case 1:
                $user->token = $account->createToken('authToken',  ['ability:user'])->plainTextToken; 
                return ['success' => true, 'token' => $user, 'role' => 'User'];
            default:
                Auth::logout();
                return ['success' => false, 'error' => 'You are banned.'];
        }

    
        // if ($account->role == 1) {
        //     return ['success' => true, 'token' => $token, 'role' => 'User'];
        // } elseif ($account->role == 0) {
        //     return ['success' => true, 'token' => $token, 'role' => 'Admin'];
        // } else {
        //     Auth::logout();
        //     return ['success' => false, 'error' => 'You are banned.'];
        // }

    }
    
}
?>