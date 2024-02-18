<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordMail;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\users\users;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.index');
    Route::post('/register', [AuthController::class, 'register'])->name('register.reset');

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login.reset');

    Route::get('/forgetPassword', [ForgetPasswordMail::class, 'index'])->name('forgetPassword.index');
    Route::post('/forgetPassword', [ForgetPasswordMail::class, 'PasswordResetMail'])->name('forgetPassword.reset');


});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'role:Redact', 'checkRoleAndPermission:Redact, manage users|create media|list media|manage newsletter'], function() {
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media', [MediaController::class, 'store'])->name('media.add');

    Route::get('/addMedia', [MediaController::class, 'mediaAddIndex'])->name('addMedia.index');
});

Route::group(['middleware' => 'role:Admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.index');
    Route::get('/pdf', [AdminController::class, 'download'])->name('admin.pdf');
    Route::get('/list', [users::class, 'listUsers']);
    Route::delete('/list/{user}', [users::class, 'dropUser'])->name('dropUser');
    Route::post('/list/{user}', [users::class, 'restoreUser'])->name('restoreUser');
});
