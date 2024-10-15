<?php

use App\Http\Controllers\JazzcashPaymentController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/payment/initiate', [JazzcashPaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::post('/payment/response', [JazzcashPaymentController::class, 'paymentResponse']);

Route::get('/subscription/{id}', [StripePaymentController::class, 'retrieveSubscription']);
