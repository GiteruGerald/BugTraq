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
Route::get('/dash', function () {
    return view('dashboard.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/projects','AdminController@showprojects')->name('admin.project');
    Route::get('/bugs','AdminController@showbugs')->name('admin.bug');
});

Route::middleware(['auth'])->group(function () {

    Route::get('bugs/create/{project_id?}', 'BugsController@create');
    Route::resource('projects', 'ProjectsController');
    Route::resource('bugs', 'BugsController');
    Route::resource('users', 'UsersController');

});