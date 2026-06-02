<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('products')->group(function () {

    Route::post('/', function (Request $request) {
        $product = DB::table('products')->insert(
            $request->products
        );

        return $product;
    });

    Route::delete('/{id}', function ($id) {
        $product = DB::table('products')->where('id', $id)->delete();

        return $product;
    });

    Route::get('/{id}', function ($id) {
        $product = DB::table('products')->where('id', $id)->get();

        return $product;
    });

    Route::get('/', function () {
    $product = DB::table('products')->get();
    return $product;
});

});

// Route::post('products', function () {
//     $product = DB::table('products')->insert(
//         [
//             [
//                 'name' => 'Example Product',
//                 'description' => 'This is an example product.',
//                 'price' => 19.99,
//             ]
//     ]

//     );
// return $product;

// });

// route::delete('products/{id}', function ($id) {
//     $product = DB::table('products')->where('id', $id)->delete();
//     return $product;
// });

// route::get('products/{id}', function ($id) {
//     $product = DB::table('products')->where('id', $id)->get();
//     return $product;
// });



Route::get('users/{user}', function (User $user) {
    return $user;
});

// Route::post('cars', function (Car $car) {
//     car::query()->create([
//         'name' => 'Porsche',
//         'model' => '911',
//     ]);
// });
// Route::get ('cars', function() {
//     $cars = car::query()->get();
//     return $cars;
// });

// Route::delete ('cars/{id}', function($id) {
//     $cars = car::query()->where('id', $id)->delete();
//     return $cars;
// });

// Route::get ('cars/{id}', function($id) {
//     $cars = car::query()->where('id', $id)->get();
//     return $cars;
// });

// Route::put('cars/{id}', function(Request $request, $id) {
//     $cars = car::query()->where('id', $id)->update([
//         'name' => $request->name,
//         'model' => $request->model,
//     ]);
//     return $cars;
// });


Route::prefix('cars')->group(function () {

Route::post('/', [CarController::class, 'store']);

Route::get ('/', [CarController::class, 'index']);

Route::delete ('/{car}', [CarController::class, 'destroy']);

Route::get ('/{car}', [CarController::class, 'show']);

Route::put('/{car}', [CarController::class, 'update']);

});

Route::apiResource('products', ProductController::class);

Route::post('products/{product}/reduce-stock', [ProductController::class, 'reduceStock']);

