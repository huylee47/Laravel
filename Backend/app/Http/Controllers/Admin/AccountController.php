<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Services\AccountService;
use App\Services\Blogservice;
use App\Services\ProductService;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    private $accountService;
    
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
    public function indexAccount(){
        $accounts = $this->accountService->getAllAccount();
        return view('admin.account.index', compact('accounts'));
    }
    public function getAccountId($id){
        $account = $this->accountService->getAccountId($id);
        return view('admin.account.show', compact('account'));
    }
    public function createAccount(AccountRequest $request){
        $this->accountService->createAccount($request);
    }
    public function updateAccount($id, AccountRequest $request){
        $this->accountService->updateAccount($id, $request);
    }
    public function deleteAccount($id){
        $this->accountService->deleteAccount($id);
    }
    public function changeRole($id){
        $this->accountService->changeRole($id);
    }
}
