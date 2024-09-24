<?php
namespace App\Services;
use App\Models\Accounts;

class AccountService{
    public function index(){
        $accounts = Accounts::all();
        return $accounts;
    }
    public function getAccountId($id){
        return Accounts::where('id',$id)->first();
    }
    public function createAccount($username,$password,$role){
        Accounts::create([
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ]);
    }
    public function updateAccount($id,$username,$password,$role){
        $account = Accounts::find($id);
        $account->username = $username;
        $account->password = $password;
        $account->role = $role;
        $account->save();
    }
    public function deleteAccount($id){
        $account = Accounts::find($id);
        $account->delete();
    }
    public function changeRole($id){
        $account = Accounts::find($id);
        $account->role = ($account->role == 1) ? 2 : $account->role;
        $account->save();
    }
}
?>