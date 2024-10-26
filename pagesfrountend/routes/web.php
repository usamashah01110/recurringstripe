<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, 'create'])->name("pages.create");
Route::get('/pages/edit/{slug}', [PageController::class, 'edit'])->name('pages.edit');
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.edit');


 
