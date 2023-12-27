<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserInfoController;

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

Route::get('/', function (\Illuminate\Http\Request $request) {
    // パラメーターでログイン
    $name = request()->input('name');
    $password = request()->input('password');
    $tel = request()->input('tel');

    if ($name && $password) {
        $credentials = [
            'name' => $name,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {
            // return view('user-tel-search');
            return app(UserInfoController::class)->getUserInfoByTel($request);
        } else {
            return view('auth.login');
        }
    }

    // 通常のログイン


    if (Auth::check()) {
        if ($tel) {
            return app(UserInfoController::class)->getUserInfoByTel($request);
        } else {
            return app(UserInfoController::class)->getAllUserInfo();
        }
    } else {
        return view('auth.login');
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/posts/{id}', [UserInfoController::class, 'update'])->name('posts.update');

Route::get('/create', function () {
    return view('create-userinfo');
});

Route::post('/store', [UserInfoController::class, 'store'])->name('user-info.store');

Route::delete('/posts/{id}', [UserInfoController::class, 'destroy'])->name('posts.destroy');

require __DIR__.'/auth.php';
