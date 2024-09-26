<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\LoginController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/Auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::prefix('/Admin')->group(function () {
    Route::prefix('/Account')->group(function () {
        Route::get('/list',[AccountController::class,'indexAccount'])->name('admin.Account.index');
        // Route::get('/Create',[AccountController::class,'createAccountView'])->name('admin.Account.add');
        Route::post('/CreateAcc',[AccountController::class,'createAccount'])->name('admin.Account.create');
        // Route::get('/Info/{id}',[AccountController::class,'getAccountId'])->name('admin.Account.show');
        Route::get('/Edit/{id}',[AccountController::class,'updateAccountView'])->name('admin.Account.editView');
        Route::post('/EditAcc/{id}',[AccountController::class,'updateAccount'])->name('admin.Account.edit');
        Route::get('/Delete/{id}',[AccountController::class,'deleteAccount'])->name('admin.Account.delete');
    });
    Route::prefix('/Product')->group(function () {
        Route::get('/list',[ProductController::class,'indexProduct'])->name('admin.Product.index');
        // Route::get('/Create',[ProductController::class,'createProductView'])->name('admin.Product.add');
        Route::post('/CreateProduct',[ProductController::class,'createProduct'])->name('admin.Product.create');
        // Route::get('/Info/{id}',[ProductController::class,''])->name('admin.Product.show');
        Route::get('/Edit/{id}',[ProductController::class,'updateProductView'])->name('admin.Product.editView');
        Route::post('/EditProduct/{id}',[ProductController::class,'updateProduct'])->name('admin.Product.edit');
        Route::get('/Delete/{id}',[ProductController::class,'deleteProduct'])->name('admin.Product.delete');
    });
    
    Route::prefix('/Blog')->group(function () {
        Route::get('/list',[BlogController::class,'indexBlog'])->name('admin.Blog.index');
        // Route::get('/Create',[BlogController::class,'createBlogView'])->name('admin.Blog.add');
        Route::post('/CreateBlog',[BlogController::class,'createBlog'])->name('admin.Blog.create');
        // Route::get('/Info/{id}',[BlogController::class,''])->name('admin.Blog.show');
        Route::get('/Edit/{id}',[BlogController::class,'getBlogId'])->name('admin.Blog.editView');
        Route::post('/EditBlog/{id}',[BlogController::class,'updateBlog'])->name('admin.Blog.edit');
        Route::get('/Delete/{id}',[BlogController::class,'deleteBlog'])->name('admin.Blog.delete');
    });
});
Route::prefix('User')->group(function(){
    Route::prefix('/Blog')->group(function () {
        Route::get('/list', [BlogController::class, 'indexBlog'])->name('admin.Blog.index');
        Route::post('/Create', [BlogController::class, 'createBlog'])->name('admin.Blog.create');
        Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('admin.Blog.editView');
        Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('admin.Blog.edit');
        Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('admin.Blog.delete');
    });
});
