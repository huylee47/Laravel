<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Accounts;
use App\Services\admin\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    // Lấy danh sách tài khoản
    public function indexAccount()
    {
        $accounts = $this->accountService->getAllAccount();
        return response()->json($accounts);  
    }

    // Tạo tài khoản mới
    public function createAccount(AccountRequest $request)
    {
        $newAccount =  $this->accountService->createAccount($request);
        return response()->json([
            'status' => 'success',
            'account' => $newAccount
        ], 201);  
    }

    // public function store(Request $request)
    // {
    //     $account = new Accounts([
    //         'username' => $request->get('username'),
    //         'status' => 'success',
    //         'password' => bcrypt($request->get('password')),
    //     ]);
    //     $account->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'account' => $account
    //     ], 201);  
    // }

    public function getAccountId($id){
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json([
                'status' => 'Account not found',
        ], 404);
        }
        return $account;
    }
    public function updateAccount($id, AccountRequest $request)
    {
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json([
                'status' => 'Account not found',
        ], 404);
        }

        $this->accountService->updateAccount($id, $request);

        return response()->json([
            'status' => 'success',
            'updatedAccount' => $account
        ]);
    }

    public function deleteAccount($id)
    {
        // $accountCurrent = $this->accountService->getAccountId($id);
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
