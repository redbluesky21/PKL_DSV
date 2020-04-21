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
//Route::get('/passwordtoken','PasswordTokensController@index');
//Route::resource('password', 'PasswordTokensController@update');
Route::resource('tandatangan', 'TandaTanganController');
Route::resource('sertifikat', 'SertifikatController');
Route::resource('validasi', 'ValidasiController');
// Route::get('/validasi', 'ValidasiController@store');
// Route::post('/validasi/proses', 'ValidasiController@proses_upload');
Route::get('jcrop', function()
{
    return View::make('jcrop')->with('image', 'images/'. Session::get('image'));
});
Route::post('jcrop', function()
{
    $quality = 90;

    $src  = Input::get('image');
    $img  = imagecreatefromjpeg($src);
    $dest = ImageCreateTrueColor(Input::get('w'),
        Input::get('h'));

    imagecopyresampled($dest, $img, 0, 0, Input::get('x'),
        Input::get('y'), Input::get('w'), Input::get('h'),
        Input::get('w'), Input::get('h'));
    imagejpeg($dest, $src, $quality);

    return "<img src='" . $src . "'>";
    //return;
});