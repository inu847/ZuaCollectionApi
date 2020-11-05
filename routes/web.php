<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DasboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('dasboard', DasboardController::class);
Route::resource('pages', PagesController::class);
Route::resource('order', OrderController::class);
Route::resource('baju', BajuController::class);