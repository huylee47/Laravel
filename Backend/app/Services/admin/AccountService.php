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

        $newAccount = Accounts::create([
            'username' =>$request->username,
            'password' =>bcrypt($request->password),
            'role' => 1,
        ]);
        return $newAccount;
    }
    public function updateAccount($id,AccountRequest $request){
        $account = Accounts::findOrFail($id);
        $account->update([
            'username' => $request->validated()['username'],
            'password' => bcrypt($request->validated()['password']),
            'role' => $request->input('role'),
        ]);
        return $account;
    }

    public function deleteAccount($id){
        $account = Accounts::find($id);
        $account->delete();
    }
}
?>