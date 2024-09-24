<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function createAccount(){

    }
}
