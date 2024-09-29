<?php 
namespace App\Services\admin;

use App\Models\Accounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginService {
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