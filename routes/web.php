<?php

use App\Http\Controllers\Users;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('tes');
});
Route::get('/users', [Users::class, 'index']);
Route::post('/users/login', [Users::class, 'login']);
Route::get('/users/homepage-admin', [Users::class, 'homepageAdmin'])->middleware('can:admin');
Route::get('/users/homepage-staff', [Users::class, 'homepageStaff'])->middleware('auth');
