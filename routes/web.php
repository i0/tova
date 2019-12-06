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
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    # Set Carbon Lang
    \Carbon\Carbon::setLocale(LaravelLocalization::getCurrentLocale());
    # Public
    Auth::routes();
    Route::get('/t', 't@index');
    Route::get('/about-us', 'PagesController@aboutUs');
    Route::get('/help', 'PagesController@help');
    Route::name('home')->get('/home', 'HomeController@index');
    # Authenticated
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index');
        Route::get('labs', 'LabsController@index');
        Route::name('billing')->get('billing', 'BillingController@index');
        Route::name('buy')->get('buy', 'BillingController@buy');
        Route::group(['middleware' => 'subscribed'], function() {
            Route::group(['prefix' => 'groups'], function () {
                Route::get('create', 'GroupsController@create');
                Route::post('store', 'GroupsController@store');
                Route::get('delete', 'GroupsController@delete');
                Route::get('index', 'GroupsController@index');
            });
            Route::group(['prefix' => 'participants'], function () {
                Route::get('create', 'ParticipantsController@create');
                Route::post('store', 'ParticipantsController@store');
                Route::get('delete', 'ParticipantsController@delete');
                Route::get('index', 'ParticipantsController@index');
            });
            Route::group(['prefix' => 'test'], function () {
                Route::get('step1', 'TestController@step1');
                Route::get('group/{id}', 'TestController@group');
                Route::get('step2', 'TestController@step2');
                Route::get('visual', 'TestController@visual');
                Route::get('auditory', 'TestController@auditory');
                Route::get('result', 'TestController@result');
            });
            Route::group(['prefix' => 'report'], function () {
                Route::get('group', 'ReportController@getGroup');
                Route::post('group', 'ReportController@postGroup');
                Route::get('individual', 'ReportController@getIndividual');
                Route::post('individual', 'ReportController@postIndividual');
                Route::get('pdf/{id}', 'ReportController@getPdf');
                Route::get('excel/{id}', 'ReportController@getExcel');
            });
        }); # Subscribed
        Route::group(['middleware' => 'admin'], function() {
          Route::get('users', 'UsersController@index');
          Route::get('users/{id}/edit', 'UsersController@edit');
          Route::post('users/{id}/edit', 'UsersController@update');
        }); # Admin
    }); # Authenticated
    Route::get('lab', 'HomeController@lab');
});
