<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 Route::prefix('/Auth')->group(function () {
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
Route::prefix('/admin')->middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::prefix('/account')->group(function () {
        Route::get('/list', [AccountController::class, 'indexAccount'])->name('admin.Account.index');
        Route::post('/create', [AccountController::class, 'createAccount'])->name('admin.Account.create');
        Route::get('/{id}', [AccountController::class, 'getAccountId'])->name('admin.Account.editView');
        Route::put('/{id}', [AccountController::class, 'updateAccount'])->name('admin.Account.edit');
        Route::delete('/{id}', [AccountController::class, 'deleteAccount'])->name('admin.Account.delete');
    });
    
    Route::prefix('/product')->group(function () {
        Route::get('/list', [ProductController::class, 'indexProduct'])->name('admin.Product.index');
        Route::post('/create', [ProductController::class, 'createProduct'])->name('admin.Product.create');
        Route::get('/{id}', [ProductController::class, 'getProductId'])->name('admin.Product.editView');
        Route::put('/{id}', [ProductController::class, 'updateProduct'])->name('admin.Product.edit');
        Route::delete('/{id}', [ProductController::class, 'deleteProduct'])->name('admin.Product.delete');
    });
    
    Route::prefix('/blog')->group(function () {
        Route::get('/list', [BlogController::class, 'indexBlog'])->name('admin.Blog.index');
        Route::post('/create', [BlogController::class, 'createBlog'])->name('admin.Blog.create');
        Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('admin.Blog.editView');
        Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('admin.Blog.edit');
        Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('admin.Blog.delete');
    });
});
Route::prefix('/user')->middleware(['auth:sanctum', 'abilities:user'])->group(function() {
    Route::prefix('/blog')->group(function () {
        Route::get('/list', [BlogController::class, 'indexBlog'])->name('user.Blog.index');
        Route::post('/create', [BlogController::class, 'createBlog'])->name('user.Blog.create');
        Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('user.Blog.editView');
        Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('user.Blog.edit');
        Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('user.Blog.delete');
    });
});
    
