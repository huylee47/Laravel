<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Services\admin\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
    public function indexAccount()
    {
        $accounts = $this->accountService->getAllAccount();
        return $accounts;
    }
    public function createAccountView()
    {
        return view('admin.account.add');
    }
    public function createAccount(AccountRequest $request)
    {
        $this->accountService->createAccount($request);
    }
    public function updateAccountView($id)
    {
        $account = $this->accountService->getAccountId($id);
        return view('admin.account.edit', compact('account'));
    }
    public function updateAccount($id, AccountRequest $request)
    {
        $this->accountService->updateAccount($id, $request);
        return redirect()->route('admin.account.index');



    }
    public function deleteAccount($id)
    {
        $this->accountService->deleteAccount($id);
        return redirect()->route('admin.account.index');
    }
}