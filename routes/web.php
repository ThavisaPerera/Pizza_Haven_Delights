<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/menu',[HomeController::class,'menu']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/logout',[HomeController::class,'logout']);

Route::put('/user/profile/name', [ProfileController::class,'updateName'])->name('profile.update.name');
Route::put('/user/profile/email', [ProfileController::class,'updateEmail'])->name('profile.update.email');
Route::put('/user/profile/phone', [ProfileController::class,'updatePhone'])->name('profile.update.phone');
Route::put('/user/profile/address', [ProfileController::class,'updateAddress'])->name('profile.update.address');
Route::put('/user/profile/password', [ProfileController::class,'updatePassword'])->name('profile.update.password');

Route::get('/view_catagory',[AdminController::class,'view_catagory']);
Route::post('/add_catagory',[AdminController::class,'add_catagory']);
Route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);


Route::get('/view_item',[AdminController::class,'view_item']);
Route::post('/add_item',[AdminController::class,'add_item']);
Route::get('/show_item',[AdminController::class,'show_item']);
Route::get('/delete_item/{id}',[AdminController::class,'delete_item']);
Route::get('/edit_item/{id}',[AdminController::class,'edit_item']);
Route::post('/edit_item_confirm/{id}',[AdminController::class,'edit_item_confirm']);


Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);


Route::get('/order',[HomeController::class,'order']);


Route::get('/view_order',[AdminController::class,'view_order']);
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
