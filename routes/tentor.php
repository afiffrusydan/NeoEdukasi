<?php

use Illuminate\Support\Facades\Route;
Route::namespace('Auth')->group(function () {

  Route::get('login', 'TentorAuthController@getLogin')->name('tentor.login');
  Route::post('login', 'TentorAuthController@postLogin')->name('tentor.loginPost');
  Route::get('logout', 'TentorAuthController@postLogout')->name('tentor.logout');
  Route::get('registration', 'TentorRegisController@registration')->name('tentor.register_page');
  Route::post('post-registration', 'TentorRegisController@postRegistration')->name('register.post'); 
});

Route::group([
  'middleware' => [
      'auth:tentor',
  ],
], function () {
  // for all admins
  Route::get('/', 'TentorController@dashboard')->name('tentor.dashboard');
  Route::get('home', 'TentorController@dashboard')->name('tentor.dashboard');
  Route::get('dashboard', 'TentorController@dashboard')->name('tentor.dashboard');
  // for administrator

});



