<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SubscriptionController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [SubscriptionController::class, 'showSubscriptionForm'])->name('subscribe.form');
Route::post('subscribe', [SubscriptionController::class, 'processSubscription'])->name('subscribe.process');
Route::post('webhook', [SubscriptionController::class, 'handleWebhook'])->name('stripe.webhook');

