<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Services\admin\AccountService;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
    // get all accounts controller
    public function indexAccount()
    {
        $accounts = $this->accountService->getAllAccount();
        return response()->json($accounts);  
    }
    // create new account controller
    public function createAccount(AccountRequest $request)
    {
        $newAccount =  $this->accountService->createAccount($request);
        return response()->json([
            'status' => 'success',
            'account' => $newAccount
        ], 201);  
    }
    // get account by id controller
    public function getAccountId($id){
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json([
                'status' => 'Account not found',
        ], 404);
        }
        return $account;
    }
    // update account by id controller 
    public function updateAccount($id, AccountRequest $request)
    {
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json([
                'status' => 'Account not found',
        ], 404);
        }

        $newAccount = $this->accountService->updateAccount($id, $request);

        return response()->json([
            'status' => 'success',
            'updatedAccount' => $newAccount
        ]);
    }
    // delete account by id controller
    public function deleteAccount($id)
    {
        $account = $this->accountService->getAccountId($id);
        if (!$account) {
            return response()->json(['error' => 'Account not found'], 404);
        }
           $this->accountService->deleteAccount($id);
            return response()->json([
            'status' => 'success',
            'deletedAccount' => $account
        ]);
        

    }
}
