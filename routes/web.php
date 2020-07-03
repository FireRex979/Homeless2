<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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

Route::get('/kpr', function () {
    return view('user.simulasi_kpr');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/residence-detail', function () {
    return view('user.detail_residence');
});

Route::get('/residence', function () {
    return view('user.residence');
});

Route::get('/furniture', function(){
    return view('user.furniture');
});

Route::get('/message', function () {
    return view('user.message');
});

Route::get('/forget-password', function () {
    $route = 'profile';
    return view('user.forget_password', compact('route'));
});

Route::get('/news-detail', function () {
    return view('user.news_detail');
});

Route::get('/news', function () {
    return view('user.news');
});

Route::get('/sendCodeResetPassword', function () {
    return view('mail.reset_password');
});

Route::get('/sendbasicemail','MailController@basic_email');

Route::get('/mail', function () {
    return view('mail');
});

Route::post('/register-user', 'UserController@register');
Auth::routes(['verify'=> true]);

Route::get('/verify/{id}/{time}/{token}', 'UserController@verify');
Route::get('/verify/resend/{id}', 'UserController@resendEmailVerify');
Route::post('/login/user', 'UserController@login');
Route::get('/logout/user', 'UserController@logout');
Route::get('/user/{id}', 'UserController@profile');
Route::post('/edit-profile/user/{id}', 'UserController@editProfile');
Route::post('/change/image/profile/{id}', 'UserController@imageProfile');
Route::post('/user/change/password/{id}', 'UserController@changePassword');
Route::post('/user/forget-password/get-otp-code', 'UserController@getCodeResetPassword');
Route::post('/user/forget-password/{id}', 'UserController@forgetPassword');

Route::get('/auth/facebook', 'UserController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'UserController@handleFacebookCallback');
Route::get('/test', function(){
    return view('user.test');
});
