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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::prefix('dashboard')->group(function () {
	Route::get('/', 'HomeController@index')->name('dashboard');
	Route::resource('/barangmasuk', 'GoodsinController');
	Route::resource('/barangkeluar', 'GoodsoutController');
	Route::resource('/databarang' , 'StockController');
	Route::resource('/semuabarang' , 'AlldeviceController');
	Route::resource('/tambahuser' , 'RegistrationController');
Route::get('register', 'Auth\RegistrationController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegistrationController@store')->name('tambahuser.store');
Route::get('importexport','StockController@importExport'); 
Route::post('importproduk','StockController@importExcel'); 
Route::get('exportproduk','StockController@exportExcel');
});
