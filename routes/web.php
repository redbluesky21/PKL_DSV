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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('tandatangan', 'TandaTanganController');
Route::resource('image', 'ImageUploadController');
Route::resource('sertifikat', 'SertifikatController');
Route::get('imageUpload', 'ImageController@imageUpload');
Route::post('imageUploadPost',['as'=>'imageUploadPost','uses'=>'ImageController@imageUploadPost']);