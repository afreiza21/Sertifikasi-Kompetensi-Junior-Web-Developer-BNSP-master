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
})->name('welcome');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function() {
    Route::get('/', 'DashboardController@index')->name('index');


    Route::get('profile', 'UserController@profile')->name('profile');
    Route::put('user/update_profile', 'UserController@update_profile')->name('users.update_profile');
    Route::get('users/akun_siswa', 'UserController@akun_siswa')->name('users.akun_siswa');
    Route::resource('users', 'UserController');
    Route::get('registration/siswa', 'RegistrationController@siswa')->name('registration.siswa');
    Route::get('registration/detail', 'RegistrationController@detail')->name('registration.detail');
    Route::get('registration/cetak_kartu', 'RegistrationController@cetak_kartu')->name('registration.cetak_kartu');
    Route::resource('registration', 'RegistrationController');

});

