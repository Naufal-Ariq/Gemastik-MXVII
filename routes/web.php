<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\FrontUserController;

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

Route::get('/homepage', function () {
    return view('homepage', ['title' => 'Home Page']);
});

Route::get('/listTanaman', [FrontUserController::class, 'index'])->name('listTanaman');

Route::get('/listTanaman/{Flowers_Name}', [FrontUserController::class, 'show'])->name('listTanaman.show');