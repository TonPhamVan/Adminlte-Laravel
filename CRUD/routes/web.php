<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/signin',function(){
    return view('auth/signin');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('sanpham')->name('sanpham.')->group(function() {
    Route::get('/',[ProductController::class,'index'])->name('index');

    Route::get('/add',[ProductController::class,'add'])->name('add');

    Route::post('/add',[ProductController::class,'postAdd'])->name('postAdd');

    Route::get('/edit/{id}',[ProductController::class,'getEdit'])->name('getEdit');

    Route::post('/update',[ProductController::class,'postEdit'])->name('postEdit');

    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');



});