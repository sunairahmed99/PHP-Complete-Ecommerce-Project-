<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;

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

Route::middleware(['admin:admin'])->group(function(){
    Route::get('admin/login', [Admincontroller::class, 'loginForm']);
    Route::post('admin/login', [Admincontroller::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('backend.index');
})->name('dashboard');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
})->name('dashboard');
});

//Admin Routing Start Here

Route::get('admin/logout/lll',[Admincontroller::class, 'destroy'])->name('admin.logout');






