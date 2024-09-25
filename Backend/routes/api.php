<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('Admin')->group(function () {
    Route::prefix('/Account')->group(function () {
        Route::get('/list', [AccountController::class, 'indexAccount'])->name('admin.Account.index');
        Route::post('/Create', [AccountController::class, 'createAccount'])->name('admin.Account.create');
        Route::get('/{id}', [AccountController::class, 'getProductId'])->name('admin.Account.editView');
        Route::put('/{id}', [AccountController::class, 'updateAccount'])->name('admin.Account.edit');
        Route::delete('/{id}', [AccountController::class, 'deleteAccount'])->name('admin.Account.delete');
    });

    // Các route cho Product và Blog không thay đổi
    Route::prefix('/Product')->group(function () {
        Route::get('/list', [ProductController::class, 'indexProduct'])->name('admin.Product.index');
        Route::post('/Create', [ProductController::class, 'createProduct'])->name('admin.Product.create');
        Route::get('/{id}', [ProductController::class, 'getProductId'])->name('admin.Product.editView');
        Route::put('/{id}', [ProductController::class, 'updateProduct'])->name('admin.Product.edit');
        Route::delete('/{id}', [ProductController::class, 'deleteProduct'])->name('admin.Product.delete');
    });

    Route::prefix('/Blog')->group(function () {
        Route::get('/list', [BlogController::class, 'indexBlog'])->name('admin.Blog.index');
        Route::post('/Create', [BlogController::class, 'createBlog'])->name('admin.Blog.create');
        Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('admin.Blog.editView');
        Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('admin.Blog.edit');
        Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('admin.Blog.delete');
    });
});