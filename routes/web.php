<?php

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

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/residence-detail', function () {
    return view('user.detail_residence');
});

Route::get('/residence', function () {
    return view('user.residence');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/message', function () {
    return view('user.message');
});

Route::get('/forget-password', function () {
    return view('user.forget_password');
});

Route::get('/news-detail', function () {
    return view('user.news_detail');
});

Route::get('/news', function () {
    return view('user.news');
});

Route::get('/sendbasicemail','MailController@basic_email');

Route::get('/mail', function () {
    return view('mail');
});