<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/kategori', function () {
    return view('layouts.kategori');
});

Route::get('/regular', function () {
    return view('layouts.regular');
});

Route::get('/contact', function () {
    return view('layouts.contact');
});

Route::get('/single_blog', function () {
    return view('layouts.single_blog');
});
// Route Backend
Route::group(['prefix'=>'admin','middleware'=>['auth']],
function () {
    Route::get('/admin', function () {
        return view('backend.index');

    });
      Route::resource ('artikel','ArtikelController');
      Route::resource ('tag','TagController');
      Route::resource ('kategori','KategoriController');
}
);

Route::get('/siswa', function () {
    return view('siswa');
});

