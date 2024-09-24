<?php

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/Admin')->group(function () {
    Route::prefix('/Account')->group(function () {
        Route::get('/list',[AccountController::class,'indexAccount'])->name('admin.Account.index');
        Route::get('/Create',[AccountController::class,'createAccountView'])->name('admin.Account.add');
        Route::post('/CreateAcc',[AccountController::class,'createAccount'])->name('admin.Account.create');
        Route::get('/Info/{id}',[AccountController::class,'getAccountId'])->name('admin.Account.show');
        Route::get('/Edit/{id}',[AccountController::class,'updateAccountView'])->name('admin.Account.edit');
        Route::post('/Edit/{id}',[AccountController::class,'updateAccount']);
        Route::get('/Delete/{id}',[AccountController::class,'deleteAccount']);
        Route::post('/ChangeRole/{id}',[AccountController::class,'changeRole']);
    });
    Route::prefix('/Product')->group(function () {
    
    });
    
    Route::prefix('/Blog')->group(function () {
    
    });
});
