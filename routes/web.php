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

Route::get('/residence', function () {
    return view('user.detail_residence');
});

Route::get('/search', function () {
    return view('user.search');
});

Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/mail', function () {
    return view('mail');
});


//Route untuk admin
Route::get('/admin/home', 'AdminController@index');