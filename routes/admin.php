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
      Route::group(['prefix' => '/students', 'as' => 'admin.student.',], function () {
        Route::group(['prefix' => '/all', 'as' => 'all.'], function () {
          Route::get('all', 'Customer\Admin_StudentController@index')->name('all');
          Route::get('addnew', 'Customer\Admin_StudentController@addnew')->name('addnewstudent');
          Route::post('submit', 'Customer\Admin_StudentController@submit')->name('submit');
          Route::get('{id}/view', 'Customer\Admin_StudentController@show')->name('view');
          Route::post('delete', 'Customer\Admin_StudentController@remove')->name('delete');
          Route::post('update', 'Customer\Admin_StudentController@update')->name('update');
          Route::post('update-status', 'Customer\Admin_StudentController@updatestatus')->name('update_status');
      });
          

          Route::group(['prefix' => '/tentored-students', 'as' => 'tentored-students.'], function () {
            Route::get('index', 'Customer\Admin_TentoredStudentsController@index')->name('index');
        });
      });
  });

  Route::group([
    'middleware' => ['role:administrator|academic'],
], function () {
      Route::group(['prefix' => '/tentor', 'as' => 'admin.tentor'], function () {
        Route::get('index', 'Academic\Admin_TentorController@tentor_verification')->name('.index');
        Route::get('detail/{id}', 'Academic\Admin_TentorController@detail')->name('.detail');
        Route::post('/update-status', 'Academic\Admin_TentorController@updateStatus')->name('.status_update');
    });
      Route::group(['prefix' => '/tentor/verification', 'as' => 'admin.tentor-verification'], function () {
        Route::get('index', 'Academic\Admin_TentorVerificationController@tentor_verification')->name('.index');
        Route::get('detail/{id}', 'Academic\Admin_TentorVerificationController@tentor_verification_detail')->name('.detail');
        Route::get('get-ktp/{id}', 'Academic\Admin_TentorVerificationController@tentor_ktp_get')->name('.get-ktp');
        Route::get('get-ijazah/{id}', 'Academic\Admin_TentorVerificationController@tentor_ijazah_get')->name('.get-ijazah');
        Route::get('get-transkip/{id}', 'Academic\Admin_TentorVerificationController@tentor_transkip_get')->name('.get-transkip');
        Route::post('submit', 'Academic\Admin_TentorVerificationController@verificationSubmit')->name('.submit');
    });
  });

  Route::group([
    'middleware' => ['role:administrator|academic|customerservice'],
], function () {
      Route::group(['prefix' => '/vacancy', 'as' => 'admin.vacancy'], function () {
        Route::group(['prefix' => '/job-vacancy', 'as' => '.job-vacancy'], function () {
          Route::get('index', 'Admin_VacancyController@index')->name('.index');
          Route::get('create-step-1', 'Admin_VacancyController@create1')->name('.create1');
          Route::get('{id}/create-step-2', 'Admin_VacancyController@create2')->name('.create2');
          Route::post('submit', 'Admin_VacancyController@submit')->name('.submit');
          Route::get('{id}/view', 'Admin_VacancyController@show')->name('.show');
          Route::post('/update', 'Admin_VacancyController@update')->name('.update');
          Route::post('/delete', 'Admin_VacancyController@remove')->name('.delete');
          Route::post('/update-status', 'Admin_VacancyController@updateStatus')->name('.update_status');
      });
      Route::group(['prefix' => '/vacancy-application', 'as' => '.vacancy-application'], function () {
        Route::get('index', 'Admin_VacancyApplicationController@index')->name('.index');
        Route::get('{id}/view', 'Admin_VacancyApplicationController@show')->name('.show');
        Route::get('{id}/view/detail/', 'Admin_VacancyApplicationController@detail')->name('.detail');
        Route::post('/view/detail/decline', 'Admin_VacancyApplicationController@decline')->name('.decline');
        Route::post('/view/detail/invite', 'Admin_VacancyApplicationController@inviteInterview')->name('.invite');
        Route::post('/view/detail/addtoshortlist', 'Admin_VacancyApplicationController@addToShortlist')->name('.add-to-shortlist');
        Route::post('/view/detail/removefromshortlist', 'Admin_VacancyApplicationController@removeFromShortlist')->name('.remove-from-shortlist');
        Route::post('/view/detail/accept', 'Admin_VacancyApplicationController@accept')->name('.accept');
    });
    Route::group(['prefix' => '/interview', 'as' => '.interview'], function () {
      Route::get('index', 'Admin_VacancyInterview@index')->name('.index');
      Route::get('{id}/show', 'Admin_VacancyInterview@show')->name('.show');
      Route::get('{appId}/detail', 'Admin_VacancyInterview@detail')->name('.detail');
      Route::get('get-ktp/{id}', 'Admin_VacancyInterview@tentor_ijazah_get')->name('.get-ijazah');
      Route::get('get-transkip/{id}', 'Admin_VacancyInterview@tentor_transkip_get')->name('.get-transkip');
      Route::post('/show/decline', 'Admin_VacancyInterview@decline')->name('.decline');
      Route::post('/show/accept', 'Admin_VacancyInterview@accept')->name('.accept');
      Route::post('/show/addtoShortlist', 'Admin_VacancyInterview@shortlist')->name('.shortlist');
  });
    });

    Route::group(['prefix' => '/submission', 'as' => 'admin.submission'], function () {
      Route::group(['prefix' => '/student-progress', 'as' => '.student-progress'], function () {
        Route::get('/index', 'Admin_StudentProgressController@index')->name('.index');
        Route::get('{id}/detail', 'Admin_StudentProgressController@view')->name('.detail');
        Route::post('/show/approve', 'Admin_StudentProgressController@approve')->name('.approve');
        Route::post('/show/decline', 'Admin_StudentProgressController@decline')->name('.decline');
        Route::get('/create', 'Admin_StudentProgressController@create')->name('.create');
        Route::post('/create', 'Admin_StudentProgressController@postCreate')->name('.submit');
        Route::post('/getStudent', 'Admin_StudentProgressController@getStudent')->name('.get-student');
        Route::post('/getMonth', 'Admin_StudentProgressController@getMonth')->name('.get-month');
      });
      Route::group(['prefix' => '/salary-submission', 'as' => '.salary-submission'], function () {
        Route::get('/index', 'Admin_SalarySubmissionController@index')->name('.index');
        Route::get('{id}/detail', 'Admin_SalarySubmissionController@view')->name('.detail');
        Route::get('get-documentation/{id}', 'Admin_SalarySubmissionController@get_documentation')->name('.get-documentation');
        Route::get('get-presence/{id}', 'Admin_SalarySubmissionController@get_attendance')->name('.get-presence');
        Route::get('get-proof/{id}', 'Admin_SalarySubmissionController@get_proof')->name('.get-proof');
        Route::post('/show/approve', 'Admin_SalarySubmissionController@approve')->name('.approve');
        Route::post('/show/decline', 'Admin_SalarySubmissionController@decline')->name('.decline');
        Route::post('/show/update', 'Admin_SalarySubmissionController@update')->name('.update');
        Route::get('/create', 'Admin_SalarySubmissionController@create')->name('.create');
        Route::post('/create', 'Admin_SalarySubmissionController@postCreate')->name('.submit');
        Route::post('/getMonth', 'Admin_SalarySubmissionController@getMonth')->name('.get-month');
        Route::post('/getStudent', 'Admin_SalarySubmissionController@getStudent')->name('.get-student');
      });
    });

    Route::group(['prefix' => '/student-report', 'as' => 'admin.student-report'], function () {
      Route::group(['prefix' => '/student-progress', 'as' => '.student-progress'], function () {
        Route::get('/index', 'Admin_StudentReportController@index')->name('.index');
        Route::get('{id}/view', 'Admin_StudentReportController@view')->name('.view');
        Route::post('detail', 'Admin_StudentReportController@detail')->name('.detail');

        // Route::get('{id}/pdf', 'Admin_StudentReportController@get_report')->name('.get-report');
      });
    });

  });
});
