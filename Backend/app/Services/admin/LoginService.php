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
            return response()->json(['error' => 'Username is incorrect.'], 401);
        }

        if (!Hash::check($request->input('password'), $account->password)) {
            return response()->json(['error' => 'Password is incorrect.'], 401);
        }

        if ($account->role == 1) {
            Auth::login($account);
            return response()->json(['role' => 'User']);
        } elseif ($account->role == 0) {
            Auth::login($account);
            return response()->json(['role' => 'Admin']);
        } else {
            Auth::logout();
            return response()->json(['error' => 'You are banned.'], 403);
        }   
    }
}
?>