<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\SuggestionController;


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
Route::get('/test', function () {
    return view('welcome');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
   })->name("register");

Route::resource('suggestion', SuggestionController::class);
Route::resource('scrapingformforme', ScrapingController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('user', UserController::class);
Route::resource('dasboard', DasboardController::class);
Route::resource('pages', PagesController::class);
Route::resource('order', OrderController::class);
Route::resource('baju', BajuController::class);