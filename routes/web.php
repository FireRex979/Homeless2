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

//Route untuk admin
Auth::routes();
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::get('/register/admin', 'Auth\RegisterController@showRegisterAdmin')->middleware('superAdmin')->name('register.admin');
Route::post('/register/admin', 'Auth\RegisterController@storeAdmin')->middleware('superAdmin')->name('register.admin.store');

Route::get('admin', function(){
    return redirect('/admin/home');
});

Route::group(['prefix' => '/admin/', 'middleware' => ['admin']], function(){
    Route::get('home', 'AdminController@index')->name('home');
    Route::resource('fasilitas', 'FasilitasController');
    Route::resource('kategori-artikel', 'KategoriArtikelController');
    Route::resource('kelebihan', 'KelebihanController');
    Route::resource('tipe', 'TipePerumahanController');
    Route::post('tipe/image', 'TipePerumahanController@store_image')->name('tipe.store.image');
    Route::post('tipe/image_delete', 'TipePerumahanController@delete_image')->name('tipe.delete.image');
    Route::post('tipe/unique', 'TipePerumahanController@findName')->name('tipe.find');
    Route::post('tipe/upload-gambar', 'TipePerumahanController@addGambar')->name('tipe.edit.addGambar');
    Route::post('tipe/delete-gambar', 'TipePerumahanController@deleteGambar')->name('tipe.edit.deleteGambar');
    Route::post('tipe/edit-fasilitas', 'TipePerumahanController@editFasilitas')->name('tipe.edit.fasilitas');
    Route::post('tipe/add-fasilitas', 'TipePerumahanController@addFasilitas')->name('tipe.edit.addFasilitas');
    Route::post('tipe/delete-fasilitas', 'TipePerumahanController@deleteFasilitas')->name('tipe.delete.fasilitas');
    Route::resource('perumahan', 'PerumahanController');
    Route::post('perumahan/image', 'PerumahanController@store_image')->name('perumahan.store.image');
    Route::post('perumahan/image_delete', 'PerumahanController@delete_image')->name('perumahan.delete.image');
    Route::post('perumahan/unique', 'PerumahanController@findName')->name('perumahan.find');
    Route::post('perumahan/upload-gambar', 'PerumahanController@addGambar')->name('perumahan.edit.addGambar');
    Route::post('perumahan/delete-gambar', 'PerumahanController@deleteGambar')->name('perumahan.edit.deleteGambar');
    Route::post('perumahan/edit-kelebihan', 'PerumahanController@editKelebihan')->name('perumahan.edit.kelebihan');
    Route::post('perumahan/hapus-kelebihan', 'PerumahanController@deleteKelebihan')->name('perumahan.delete.kelebihan');
    Route::post('perumahan/tambah-kelebihan', 'PerumahanController@addKelebihan')->name('perumahan.edit.addKelebihan');
    Route::post('perumahan/delete-tipe', 'PerumahanController@deleteTipe')->name('perumahan.delete.tipe');
    Route::post('perumahan/tambah-tipe', 'PerumahanController@addTipe')->name('perumahan.edit.addTipe');
    Route::resource('kategori-furniture', 'KategoriFurnitureController');
    Route::resource('furniture', 'FurnitureController');
    Route::post('furniture/store-image', 'FurnitureController@storeImage')->name('furniture.store.image');
    Route::post('furniture/delete-image', 'FurnitureController@deleteImage')->name('furniture.delete.image');
    Route::post('furniture/find', 'FurnitureController@find')->name('furniture.find');
    Route::post('furniture/edit/add-image', 'FurnitureController@addGambar')->name('furniture.edit.addGambar');
    Route::post('furniture/edit/delete-gambar', 'FurnitureController@deleteGambar')->name('furniture.edit.deleteGambar');
    Route::resource('paket-furniture', 'PaketFurnitureController');
    Route::post('paket-furniture/total-harga', 'PaketFurnitureController@totalHarga')->name('paket-furniture.totalHarga');
    Route::post('paket-furniture/edit/add-furniture', 'PaketFurnitureController@addFurniture')->name('paket-furniture.edit.addFurniture');
    Route::post('paket-furniture/edit/delete-furniture', 'PaketFurnitureController@deleteFurniture')->name('paket-furniture.edit.deleteFurniture');
    Route::post('paket-furniture/unique', 'PaketFurnitureController@find')->name('paket-furniture.find');
    Route::resource('artikel', 'ArtikelController');
});
