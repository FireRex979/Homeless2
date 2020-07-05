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
Route::get('/admin/home', 'AdminController@index')->name('home');
Route::resource('/admin/fasilitas', 'FasilitasController');
Route::resource('/admin/kategori-artikel', 'KategoriArtikelController');
Route::resource('/admin/kelebihan', 'KelebihanController');
Route::resource('/admin/tipe', 'TipePerumahanController');
Route::post('/admin/tipe/image', 'TipePerumahanController@store_image')->name('tipe.store.image');
Route::post('/admin/tipe/image_delete', 'TipePerumahanController@delete_image')->name('tipe.delete.image');
Route::post('/admin/tipe/unique', 'TipePerumahanController@findName')->name('tipe.find');
Route::post('/admin/tipe/upload-gambar', 'TipePerumahanController@addGambar')->name('tipe.edit.addGambar');
Route::post('/admin/tipe/delete-gambar', 'TipePerumahanController@deleteGambar')->name('tipe.edit.deleteGambar');
Route::post('/admin/tipe/edit-fasilitas', 'TipePerumahanController@editFasilitas')->name('tipe.edit.fasilitas');
Route::post('/admin/tipe/add-fasilitas', 'TipePerumahanController@addFasilitas')->name('tipe.edit.addFasilitas');
Route::post('/admin/tipe/delete-fasilitas', 'TipePerumahanController@deleteFasilitas')->name('tipe.delete.fasilitas');
Route::resource('/admin/perumahan', 'PerumahanController');
Route::post('/admin/perumahan/image', 'PerumahanController@store_image')->name('perumahan.store.image');
Route::post('/admin/perumahan/image_delete', 'PerumahanController@delete_image')->name('perumahan.delete.image');
Route::post('/admin/perumahan/unique', 'PerumahanController@findName')->name('perumahan.find');
Route::post('/admin/perumahan/upload-gambar', 'PerumahanController@addGambar')->name('perumahan.edit.addGambar');
Route::post('/admin/perumahan/delete-gambar', 'PerumahanController@deleteGambar')->name('perumahan.edit.deleteGambar');
Route::post('/admin/perumahan/edit-kelebihan', 'PerumahanController@editKelebihan')->name('perumahan.edit.kelebihan');
Route::post('/admin/perumahan/hapus-kelebihan', 'PerumahanController@deleteKelebihan')->name('perumahan.delete.kelebihan');
Route::post('/admin/perumahan/tambah-kelebihan', 'PerumahanController@addKelebihan')->name('perumahan.edit.addKelebihan');
Route::post('/admin/perumahan/delete-tipe', 'PerumahanController@deleteTipe')->name('perumahan.delete.tipe');
Route::post('/admin/perumahan/tambah-tipe', 'PerumahanController@addTipe')->name('perumahan.edit.addTipe');
