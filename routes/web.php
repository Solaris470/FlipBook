<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\applicationadmin\HomeController;
use App\Http\Controllers\FlipBookController;
use App\Http\Controllers\Front\FrontController;
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

//frontend
Route::get('/front/flipbook', [FrontController::class,'index']);
Route::get('/front/flipbook/{id}', [FrontController::class,'ebook']);
Route::get('/front/flipbook/{id}/{page}/edit', [FrontController::class,'edit']);
Route::get('/zip/{id}', [FrontController::class, 'zipfile']);

//admin
Route::get('/flipbook', [FlipBookController::class, 'index'])->name('flipbook.index');
Route::get('/create', [FlipBookController::class, 'create'])->name('flipbook.create');
Route::post('/create', [FlipBookController::class, 'store'])->name('flipbook.store');
