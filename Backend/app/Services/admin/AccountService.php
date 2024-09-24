<?php
namespace App\Services\admin;
use App\Models\Accounts;
use App\Http\Requests\AccountRequest;

class AccountService{
    public function getAllAccount(){
        $Accounts = Accounts::all();
        return $Accounts;
    }
    public function getAccountId($id){
        return Accounts::where('id',$id)->first();
    }
    public function createAccount(AccountRequest $request){

        Accounts::create([
            'username' =>$request->username,
            'password' =>bcrypt($request->password),
            'role' => 1,
        ]);
    }
    public function updateAccount($id,AccountRequest $request){
        $account = Accounts::find($id);
        $account->username = $request->validated()['username'];
        $account->password = bcrypt($request->validated()['password']); 
        $account->role = $request->input('role');
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