<?php

use App\Http\Controllers\AdventureController;
use App\Http\Controllers\CountryController;

use Illuminate\Support\Facades\Route;

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

Route::get('/h', function () {
    return view('home');
});

Route::get('/', [CountryController::class, 'index']);

Route::get('/adventure',[AdventureController::class,'create'])->name('Adventure');
Route::post('/adventure',[AdventureController::class,'store'])->name('addAdventure');


