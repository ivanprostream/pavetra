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


/** Admin routes **/

Route::group(
	[
		'prefix' => 'admin',
		'middleware' => ['auth', 'verified'],
		'namespace'  => 'App\Http\Controllers\Admin'
	], function () {

    // Sidebar
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('/settings/{id}', 'SettingsController@update');
    Route::get('/change_password', 'SettingsController@change_password');
    Route::put('/change_password/{id}', 'SettingsController@update_password');

    // Elements for superadmin

    Route::get('/localization', 'SettingsController@localization')->name('localization');
    Route::post('/country_new', 'SettingsController@country_store');
    Route::get('/country_edit/{id}', 'SettingsController@country_edit');
    Route::put('/country_edit/{id}', 'SettingsController@country_update');

    Route::get('/lang_list', 'SettingsController@lang_list')->name('lang_list');
    Route::post('/lang_new', 'SettingsController@lang_store');
    Route::get('/lang_edit/{id}', 'SettingsController@lang_edit');
    Route::put('/lang_edit/{id}', 'SettingsController@lang_update');

    Route::get('/country_const_list', 'SettingsController@country_const_list')->name('country_const_list');
    Route::post('/country_const_new', 'SettingsController@country_const_store');
    Route::delete('/country_const_delete/{id}', 'SettingsController@country_const_destroy');

    // Feedback

    Route::get('/feedback', 'FeedbackController@index');
    Route::delete('/message_delete/{id}', 'FeedbackController@destroy');

    // Users

    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/user_create', 'UserController@create');
    Route::post('/user_create', 'UserController@store');
    Route::get('/user_edit/{id}', 'UserController@edit');
    Route::put('/user_edit/{id}', 'UserController@update');
    Route::delete('/user_delete/{id}', 'UserController@destroy');

    // Pages
    Route::get('/pages', 'PageController@index')->name('pages');
    Route::get('/page_show/{id}', 'PageController@show');
    Route::get('/page_create', 'PageController@create');
    Route::post('/page_create', 'PageController@store');
    Route::get('/page_edit/{id}', 'PageController@edit');
    Route::put('/page_edit/{id}', 'PageController@update');
    Route::delete('/page_delete/{id}', 'PageController@destroy');
    Route::post('/page/sorting', 'PageController@sorting');

    // Categories
    Route::get('/categories', 'CategoryController@index');
    Route::get('/category_show/{id}', 'CategoryController@show');
    Route::get('/category_create', 'CategoryController@create');
    Route::post('/category_create', 'CategoryController@store');
    Route::get('/category_edit/{id}', 'CategoryController@edit');
    Route::put('/category_edit/{id}', 'CategoryController@update');
    Route::delete('/category_delete/{id}', 'CategoryController@destroy');
    Route::post('/category/sorting', 'CategoryController@sorting');

    // Blog
    Route::get('/blog', 'BlogController@index');
    Route::get('/blog_create', 'BlogController@create');
    Route::post('/blog_create', 'BlogController@store');
    Route::get('/blog_edit/{id}', 'BlogController@edit');
    Route::put('/blog_edit/{id}', 'BlogController@update');
    Route::delete('/blog_delete/{id}', 'BlogController@destroy');
    Route::post('/blog/sorting', 'BlogController@sorting');



	// Route::resource('/', 'Pages\HomeController');

	//Route::resource('settings', 'Settings\SettingsController');

	// Route::resource('/pages', 'Pages\PageController');
	// Route::get('/structure', 'Pages\PageController@index');
	// Route::post('/pages/sort', 'Pages\PageController@sort');

	// Route::get('/pages/gallery/{id}', 'Pages\PageController@gallery');
	// Route::get('/pages/delete_image/{id}', 'Pages\PageController@delete_image');
	// Route::patch('/pages/gallery_create/{id}', 'Pages\PageController@gallery_create');
	// Route::delete('/pages/gallery_delete/{id}', 'Pages\PageController@gallery_delete');
	// Route::post('/pages/sort_gallery', 'Pages\PageController@sort_gallery');

});



require __DIR__.'/auth.php';


// Site routes

Route::group([ 'namespace'  => 'App\Http\Controllers\Site' ], function () {

    //Route::get('/', 'HomeController@comingsoon')->name('home');

    Route::get('/', 'HomeController@index');

    Route::get('/search', 'CatalogController@search')->name('search');

    Route::post('/send_message', 'FeedbackController@send_message')->name('send_message');

    Route::get('/{slug}/{slug_2}/{slug_3}/{slug_4}/{slug_5}', 'PageController@page');
    Route::get('/{slug}/{slug_2}/{slug_3}/{slug_4}', 'PageController@page');
    Route::get('/{slug}/{slug_2}/{slug_3}', 'PageController@page');
    Route::get('/{slug}/{slug_2}', 'PageController@page');
    Route::get('/{slug}', 'PageController@page');



});
