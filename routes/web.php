<?php
// routes/web.php
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdventureController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Pages;

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

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

Route::get('/', [HomeController::class,"filterPosts"])->name('filterAdventures');
Route::get('/adventure',[AdventureController::class,'create'])->name('Adventure');
Route::get('/adventure',[CountryController::class,'create']);
Route::post('/adventure',[AdventureController::class,'store'])->name('addAdventure');


