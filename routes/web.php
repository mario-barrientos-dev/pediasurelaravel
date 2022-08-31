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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/terminos-y-condiciones', function () {
    return view('terms');
})->name('terms');

Route::get('/reglamento', function () {
    return view('regulation');
})->name('regulation');

Route::get('/preguntas-frecuentes', function () {
    return view('faq');
})->name('faq');

Route::get('/contactanos', function () {
    return view('contact');
})->name('contact');

Route::post('/contactanos', 'HomeController@sendContact')->name('sendContact');
Route::get('ganadores', 'CodeController@winners')->name('winners');

Auth::routes(['verify' => false]);
Route::group(['middleware' => 'auth:customers'], function () {
    Route::get('registrar-facturas', 'CodeController@get')->name('codes');
    Route::post('registrar-facturas', 'CodeController@post')->name('postCodes');
    Route::get('editar-perfil', 'ProfileController@get')->name('editProfile');
    Route::post('editar-perfil', 'ProfileController@post')->name('postEditProfile');
});

/**
 * Admin
 */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'], function () {
        Route::post('contest/generate', 'Admin\ContestController@generate')->name('admin_contest_generate');
        Route::post('contest/update', 'Admin\ContestController@update')->name('admin_contest_update');
        Route::get('customer/export', 'Admin\CustomerController@export')->name('admin_customer_export');
    });
});
