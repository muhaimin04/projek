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


//Route Frontend
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'FrontendController@index');
    Route::get('about', 'FrontendController@about');
    Route::get('blog', 'FrontendController@blog');
    Route::get('single-blog/{artikel}', 'FrontendController@singleblog');
    Route::get('blog-tag/{tag}', 'FrontendController@blogtag');
    Route::get('blog-kategori/{kategori}', 'FrontendController@blogkategori');
    Route::get('contact', 'FrontendController@contact');
    Route::get('regular', 'FrontendController@regular');
    Route::get('kategori', 'FrontendController@kategori');
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

