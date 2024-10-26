<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/donation/one-time', [StripePaymentController::class, 'processOneTimeDonation']);

Route::post('/donation/recurring', [StripePaymentController::class, 'processRecurringDonation']);

Route::get('/{slug}', [PageController::class, 'show']);

Route::get('/all/pages', [PageController::class, 'index']);

Route::get('/pages/edit/{slug}', [PageController::class, 'edit']);
Route::post('/pages/update/{id}', [PageController::class, 'update']);
Route::post('pages/store', [PageController::class, 'store']);

Route::get('pages/delete/{id}', [PageController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
