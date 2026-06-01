<?php

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



