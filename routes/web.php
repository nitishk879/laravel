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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'WelcomeController@index');
Route::get('/about', 'WelcomeController@about');
Route::get('/contact', 'WelcomeController@contact');

//Route::get('/services', 'PagesController@index');
//Route::get('/service/{$service_slug}', 'PagesController@get_service');

Route::resource('posts', 'PostController');
Route::resource('services', 'ServiceController');
Route::resource('events', 'EventsController');

Route::resource('brands', 'BrandController');
Route::resource('segments', 'SegmentController');
Route::resource('items', 'ItemController');
Route::resource('customers', 'CustomersController');
Route::resource('companies', 'CompaniesController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');