<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::namespace('Auth')->group(function () {
  Route::get('login', 'TentorAuthController@getLogin')->name('tentor.login');
  Route::post('login', 'TentorAuthController@postLogin')->name('tentor.loginPost');
  Route::get('logout', 'TentorAuthController@postLogout')->name('tentor.logout');
  Route::get('registration', 'TentorRegisController@registration')->name('tentor.register_page');
  Route::post('post-registration', 'TentorRegisController@postRegistration')->name('register.post'); 
  Route::get('verify/{token}', 'TentorRegisController@verifyAccount')->name('tentor.verify'); 
});

Route::group([
  'middleware' => [
      'auth:tentor',
      'is_verify_email'
  ],
], function () {

  Route::get('/', 'TentorController@dashboard')->name('tentor.dashboard');
  Route::get('home', 'TentorController@dashboard')->name('tentor.dashboard');
  Route::get('dashboard', 'TentorController@dashboard')->name('tentor.dashboard');
  Route::post('tentor_id_verify', 'TentorController@tentorsid_verify')->name('tentor_id_verify');
  Route::get('profile', 'TentorController@profile')->name('tentor.profile');
  Route::get('/verify', 'TentorVerificationController@verify')->name('tentor.verification');
  Route::get('get/{filename}', 'TentorController@getFile')->name('getfile');
});


Route::group([
  'middleware' => [
      'auth:tentor',
      'is_verify_email',
      'is_active'
  ],
], function () {

  Route::get('bank-account', 'TentorController@bankaccount')->name('tentor.bankaccount');
  Route::post('/check-bank-account', 'TentorController@checkbankaccount')->name('tentor.checkbank');
  Route::post('/update-bank-account', 'TentorController@bankUpdate')->name('tentor.updatebank');
  Route::group(['prefix' => '/vacancy', 'as' => 'tentor.vacancy'], function () {
    Route::get('vacancy', 'TentorVacancyController@index')->name('.index');
    Route::get('view-vacancy/{id}', 'TentorVacancyController@view')->name('.detail');
    Route::get('apply-vacancy/{id}', 'TentorVacancyController@submitApplication')->name('.apply');
});
});


Route::group([
  'middleware' => [
    'auth:tentor',
    'is_verify_email',
    'is_active',
    'is_hired'
],
], function () {
    Route::group(['prefix' => '/student-progress-report', 'as' => 'tentor.progress-report'], function () {
      Route::get('/index', 'Tentor_StudentProgressController@index')->name('.index');
      Route::get('detail/{id}', 'Tentor_StudentProgressController@view')->name('.detail');
      Route::get('/add', 'Tentor_StudentProgressController@create')->name('.addnew');
      Route::post('/add', 'Tentor_StudentProgressController@postCreate')->name('.submit');
      Route::post('/update', 'Tentor_StudentProgressController@update')->name('.update');
      Route::post('/getMonth', 'Tentor_StudentProgressController@getMonth')->name('.get-month');
  });
    Route::group(['prefix' => '/salary-submission', 'as' => 'tentor.salary-submission'], function () {
      Route::get('/index', 'TentorSalarySubmissionController@index')->name('.index');
      Route::get('detail/{id}', 'TentorSalarySubmissionController@view')->name('.detail');
      Route::get('update/{id}', 'TentorSalarySubmissionController@update')->name('.update');
      Route::get('/add', 'TentorSalarySubmissionController@create')->name('.addnew');
      Route::post('/add', 'TentorSalarySubmissionController@postCreate')->name('.submit');
      Route::post('/update', 'TentorSalarySubmissionController@postUpdate')->name('.post-update');
      Route::post('/getMonth', 'TentorSalarySubmissionController@getMonth')->name('.get-month');
      Route::post('/check', 'TentorSalarySubmissionController@check')->name('.check');
  });
});


