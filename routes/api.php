<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller('App\Http\Controllers\Api\OrdersController')->group(function () {
    Route::get('/orders', 'index');
    Route::get('/orders/stats', 'orderStats');
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
    Route::put('/orders/{id}', 'update');
    Route::delete('/orders/{id}', 'delete');
    
});