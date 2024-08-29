<?php

use App\Http\Controllers\Api\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\EmailtController;

Route::apiResource('invoice', InvoiceController::class);
Route::apiResource('product', ProductController::class);
Route::post('send-email', [EmailtController::class, 'sendInvoice']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



