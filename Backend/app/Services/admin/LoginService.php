<?php 
namespace App\Services\admin;

use App\Http\Requests\LoginRequest;
use App\Models\Accounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService {
    // Login service 
    public function loginAuth(LoginRequest $request) {
        // Validate the request
        $account = Accounts::where('username', $request->input('username'))->first();
        if (!$account) {
            return ['success' => false, 'error' => 'Username is incorrect.'];
        }
    
        if (!Hash::check($request->input('password'), $account->password)) {
            return ['success' => false, 'error' => 'Password is incorrect.'];
        }
        // create role after authentication
        Auth::login($account);
        /** @var \App\Models\Accounts $user **/
        $user = Auth::user();
        
        switch($user->role) {
            case 0:
                $token = $account->createToken('authToken', ['admin'])->plainTextToken; 
                return ['success' => true, 'token' => $token, 'role' => 'admin'];
            case 1:
                $token = $account->createToken('authToken', ['user'])->plainTextToken; 
                return ['success' => true, 'token' => $token, 'role' => 'user'];
            default:
                Auth::logout();
                return ['success' => false, 'error' => 'You are banned.'];
        }
    }
    
    
    
}
?>