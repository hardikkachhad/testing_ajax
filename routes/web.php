<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix("admin")->group(function () {

    Route::get("/",[DashboardController::class,'index'])->name("admin.dashboard");

    Route::prefix("category")->group(function () {
     Route::get("/index",[CategoryController::class,'category'])->name("category.index");
     Route::get("/create",[CategoryController::class,'create'])->name("category.create");
     Route::post("/store",[CategoryController::class,'store'])->name("category.store");
     Route::post('/chengestatus',[CategoryController::class,'changestatus'])->name('category.chnageStatus');
     Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
     Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
     Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
    });

    Route::prefix("product")->group(function () {
        Route::get("/index",[ProductController::class,'index'])->name("product.index");
        Route::get("/create",[ProductController::class,'create'])->name("product.create");
        Route::post("/store",[ProductController::class,'store'])->name("product.store");

       });
});

