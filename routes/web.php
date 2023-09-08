<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
