<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Blogs;
use App\Models\Products;

class IndexController extends Controller
{
    public function count(){
        $account = Accounts::count();
        $blog = Blogs::count();
        $product = Products::count();
        return  response()->json([
            'account' => $account,
            'blog' => $blog,
            'product' => $product,
        ]);
    }
}
