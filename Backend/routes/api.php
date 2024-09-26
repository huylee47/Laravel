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
// Route::prefix('Admin')->group(function () {
//     Route::prefix('/Account')->group(function () {
//         Route::get('/list', [AccountController::class, 'indexAccount'])->name('admin.Account.index');
//         Route::post('/Create', [AccountController::class, 'createAccount'])->name('admin.Account.create');
//         Route::get('/{id}', [AccountController::class, 'getProductId'])->name('admin.Account.editView');
//         Route::put('/{id}', [AccountController::class, 'updateAccount'])->name('admin.Account.edit');
//         Route::delete('/{id}', [AccountController::class, 'deleteAccount'])->name('admin.Account.delete');
//     });

//     Route::prefix('/Product')->group(function () {
//         Route::get('/list', [ProductController::class, 'indexProduct'])->name('admin.Product.index');
//         Route::post('/Create', [ProductController::class, 'createProduct'])->name('admin.Product.create');
//         Route::get('/{id}', [ProductController::class, 'getProductId'])->name('admin.Product.editView');
//         Route::put('/{id}', [ProductController::class, 'updateProduct'])->name('admin.Product.edit');
//         Route::delete('/{id}', [ProductController::class, 'deleteProduct'])->name('admin.Product.delete');
//     });

//     Route::prefix('/Blog')->group(function () {
//         Route::get('/list', [BlogController::class, 'indexBlog'])->name('admin.Blog.index');
//         Route::post('/Create', [BlogController::class, 'createBlog'])->name('admin.Blog.create');
//         Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('admin.Blog.editView');
//         Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('admin.Blog.edit');
//         Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('admin.Blog.delete');
//     });
// });
// Route::prefix('User')->group(function(){
//     Route::prefix('/Blog')->group(function () {
//         Route::get('/list', [BlogController::class, 'indexBlog'])->name('admin.Blog.index');
//         Route::post('/Create', [BlogController::class, 'createBlog'])->name('admin.Blog.create');
//         Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('admin.Blog.editView');
//         Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('admin.Blog.edit');
//         Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('admin.Blog.delete');
//     });
// });
Route::prefix('/Admin')->middleware(['auth:sanctum', 'role:0'])->group(function () {
    Route::prefix('/Account')->group(function () {
        Route::get('/list', [AccountController::class, 'indexAccount'])->name('admin.Account.index');
        Route::post('/CreateAcc', [AccountController::class, 'createAccount'])->name('admin.Account.create');
        Route::get('/Edit/{id}', [AccountController::class, 'updateAccountView'])->name('admin.Account.editView');
        Route::post('/EditAcc/{id}', [AccountController::class, 'updateAccount'])->name('admin.Account.edit');
        Route::get('/Delete/{id}', [AccountController::class, 'deleteAccount'])->name('admin.Account.delete');
    });
    
    Route::prefix('/Product')->group(function () {
        Route::get('/list', [ProductController::class, 'indexProduct'])->name('admin.Product.index');
        Route::post('/CreateProduct', [ProductController::class, 'createProduct'])->name('admin.Product.create');
        Route::get('/Edit/{id}', [ProductController::class, 'updateProductView'])->name('admin.Product.editView');
        Route::post('/EditProduct/{id}', [ProductController::class, 'updateProduct'])->name('admin.Product.edit');
        Route::get('/Delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.Product.delete');
    });
    
    Route::prefix('/Blog')->group(function () {
        Route::get('/list', [BlogController::class, 'indexBlog'])->name('admin.Blog.index');
        Route::post('/CreateBlog', [BlogController::class, 'createBlog'])->name('admin.Blog.create');
        Route::get('/Edit/{id}', [BlogController::class, 'getBlogId'])->name('admin.Blog.editView');
        Route::post('/EditBlog/{id}', [BlogController::class, 'updateBlog'])->name('admin.Blog.edit');
        Route::get('/Delete/{id}', [BlogController::class, 'deleteBlog'])->name('admin.Blog.delete');
    });
});
Route::prefix('User')->middleware(['auth:sanctum', 'role:1'])->group(function() {
    Route::prefix('/Blog')->group(function () {
        Route::get('/list', [BlogController::class, 'indexBlog'])->name('user.Blog.index');
        Route::post('/Create', [BlogController::class, 'createBlog'])->name('user.Blog.create');
        Route::get('/{id}', [BlogController::class, 'getBlogId'])->name('user.Blog.editView');
        Route::put('/{id}', [BlogController::class, 'updateBlog'])->name('user.Blog.edit');
        Route::delete('/{id}', [BlogController::class, 'deleteBlog'])->name('user.Blog.delete');
    });
});
    
