<?php

namespace App\Http\Controllers;

use App\Services\admin\AccountService;
use App\Services\admin\Blogservice;
use App\Services\admin\ProductService;


abstract class Controller
{
    private $accountService;
    private $blogService;
    private $productService;


    public function __construct(AccountService $accountService , Blogservice $blogService , ProductService $productService){
        $this->accountService = $accountService;
        $this->blogService = $blogService;
        $this->productService = $productService;
    }
    public function count(){}
}
