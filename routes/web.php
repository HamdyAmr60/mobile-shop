<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\superAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/superadmin', function () {
    return view('dashboard');
})->middleware(superAdmin::class);
Route::get('/', function () {
    return view('index');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function(){
        return view('panel.index');
    }
    )->name('dashboard');
});





Route::controller(UserController::class)->group(function (){

    Route::get('/logout',  "logout");

    Route::get("/profile" , "profile");
    Route::get("/edit" , "edit");
    Route::post("/editprofile/{id}" , "editprofile");


});
Route::controller(CategoryController::class)->group(function(){

    Route::get("/categories/all", "all");
    Route::get("/category/add", "add");
    Route::post("/category/store", "store");
    Route::get("/category/show/{id}", "show");
    Route::get("/category/update/{id}", "update");
    Route::post("/category/catupdate/{id}", "catupdate");
    Route::post("/category/delete/{id}", "delete");
});


Route::controller(ProductController::class)->group(function(){

    Route::get("/products/all", "all");
    Route::get("/product/add", "add");
    Route::post("/product/store", "store");
    Route::get("/product/show/{id}", "show");
    Route::get("/product/update/{id}", "update");
    Route::post("/product/pupdate/{id}", "pupdate");
    Route::post("/product/delete/{id}", "delete");
    Route::post("/product/quantity/{id}", "updateQuantity");
});


/*Route::controller(StoreProductController::class)->group(function(){

    Route::get("/store/all", "all");
    Route::get("/store/add", "add");
    Route::post("/product/store", "store");
    Route::get("/product/show/{id}", "show");
    Route::get("/product/update/{id}", "update");
    Route::post("/product/pupdate/{id}", "pupdate");
    Route::post("/product/delete/{id}", "delete");
    Route::post("/product/quantity/{id}", "updateQuantity");
});*/