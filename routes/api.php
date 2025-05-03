<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;

//order routes
Route::controller(OrdersController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::get('/orders/stats', 'orderStats');
    Route::get('/orders/filter/status', 'getOrderByStatus');

    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
    Route::put('/orders/{id}', 'update');
    Route::delete('/orders/{id}', 'delete');
});
