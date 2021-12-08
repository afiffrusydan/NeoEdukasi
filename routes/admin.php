<?php

use Illuminate\Support\Facades\Route;
Route::namespace('Auth')->group(function () {
  Route::get('login', 'AdminAuthController@getLogin')->name('admin.login');
  Route::post('login', 'AdminAuthController@postLogin')->name('admin.loginPost');
  Route::get('logout', 'AdminAuthController@postLogout')->name('admin.logout');
});



Route::group([
  'middleware' => [
      'auth:admin',
  ],
], function () {

  // for all admins
  Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('home', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  // for administrator
  Route::group([
    'middleware' => ['role:administrator|customerservice'],
], function () {
      // users
      Route::group(['prefix' => 'students', 'as' => 'siswa.',], function () {
          Route::get('all', 'UserController@index')->name('all');
      });
  });

});



