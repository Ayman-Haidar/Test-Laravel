<?php

use App\Http\Controllers\CarWebController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::post('products', function () {
    $product = DB::table('products')->insert(
        [
            [
             'name' => 'Example Product',
             'description' => 'This is an example product.',
             'price' => 19.99,
            ]
    ]

    );
return $product;


});

Route::get('products_all', function () {
    $product = DB::table('products')->get();
    return $product;
});

route:: get('test', function () {
    return 5;
});

Route::get('user',[UserController::class,'index'])->name('user');
Route::get('user/create',[UserController::class,'create'])->name('user.create');
Route::post('user',[UserController::class,'store'])->name('user.store');

Route::get('cars',[CarWebController::class,'index'])->name('cars');
Route::get('cars/{car}/edit',[CarWebController::class,'edit'])->name('cars.edit');
Route::get('cars/create',[CarWebController::class,'create'])->name('cars.create');
Route::post('cars',[CarWebController::class,'store'])->name('cars.store');
Route::put('cars/{car}',[CarWebController::class,'update'])->name('cars.update');
Route::delete('cars/{car}/delete',[CarWebController::class,'delete'])->name('cars.delete');

Route::get('/ayman', function () {
    return view('home');
});

