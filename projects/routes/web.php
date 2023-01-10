<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\SugarLevel;
use App\Http\Middleware\Auth as MiddlewareAuth;

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

// Route::get('/', [Auth::class, 'login']);
// Route::post('/', [Auth::class, 'entry']);

Route::resource('/', Auth::class);
Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);
Route::resource('sugar', SugarLevel::class, [
    'middleware'    => MiddlewareAuth::class
]);
Route::get('all/sugar', [SugarLevel::class, 'showAll']);
