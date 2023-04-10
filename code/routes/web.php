<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\OneLoginController;
use App\Http\Controllers\Password_Reset_Controller;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\SystemUsersController;
use App\Http\Controllers\UserRegisterController;
use App\Models\User_register;
use App\Http\Middleware\EnsureTokenIsValid;
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
    return view('auth.login');
});

Route::get('/register_user', function () {
    $users=(new UserRegisterController())->index();
    $systems=(new SystemController())->index();
    return view('user.user_register',compact('users','systems'));
})->middleware('auth')->name('register_user');

Route::get('/register_system', function () {
    $systems=(new SystemController())->index();
    return view('system.system',compact('systems'));
})->middleware('auth')->name('register_system');

Route::get('/user_systems', function () {
    $user_systems=(new SystemUsersController())->getUserSystems();
    return view('system.user_systems',compact('user_systems'));
})->middleware('auth')->name('user_systems');

Route::get('/user_profile', function () {
    $systems=(new SystemController())->index();
    $user=(new UserRegisterController())->show(Auth::user()->id);
    return view('user.user_profile',compact('user','systems'));
})->middleware('auth')->name('user_profile');

Route::get('/project', function () {

    return view('project.project');
})->middleware('auth')->name('project');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users/{id}', function ($id) { });
//user
Route::resource('/User_Register', UserRegisterController::class);
Route::post('users/update/{id}', [UserRegisterController::class,'user_update']);
//system
Route::resource('/system_Register', SystemController::class);
Route::post('system_Register/update/{id}', [SystemController::class,'update']);

//one login
Route::post('onelogin/{id}',[OneLoginController::class,'login'])->middleware(EnsureTokenIsValid::class);

//reset password
Route::resource('/reset_password',Password_Reset_Controller::class);

//captcha
Route::resource('/user_captcha',CaptchaController::class);
