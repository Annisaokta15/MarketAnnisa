<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/template', function () {
    return view('template');
});

Route::get('/template2', function () {
    return view('template2');
});
Route::get('/tampilan',[MenuController::class,'view']);
Route::get('/detail',[MenuController::class,'detail']);
Route::get('/cart', function () {
    return view('cart');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/login',[UserController::class,'login']);
Route::post('auth', [UserController::class, 'auth']);

Route:: get('dashboard',[Usercontroller::class,'tampil']);
// Route:: get('admin',[Usercontroller::class,'show']);
// Route::post('auth', [UserController::class,'tampilauth']);
Route::get('logout', [UserController::class,'logout']);



Route::get('menufood',[Menucontroller::class,'show']);
Route::get('menufood/add',[Menucontroller::class,'add']);
Route::post('menufood/create',[Menucontroller::class,'create']);
Route::get('menufood/delete/{id}',[Menucontroller::class,'delete']);
Route::get('menufood/edit/{id}', [MenuController::class,'edit']);
Route::post('menufood/update/{id}', [MenuController::class,'update']);
Route::post('daftar/create', [UserController::class,'create']);

Route::get('/checkout', [MenuController::class,'checkout']);
