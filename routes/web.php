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

Route::get('/calendar',function (){
    return view('calendar');
});
Route::get('user_reg',function (){
    return view('admin/user_reg');
});

//Route::delete('users/{id}',['as' =>'users.destroy','uses'=>'UsersController@destroy']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/projects','AdminController@showprojects')->name('admin.project');
    Route::get('/bugs','AdminController@showbugs')->name('admin.bug');
    Route::get('/users','AdminController@showusers')->name('admin.users');
    Route::delete('/projects/destroy/{id}','AdminController@destroyProject')->name('admin.projects.destroy');
    Route::get('/pj_details/{id}','AdminController@show_project_details');
    Route::get('/bg_details/{id}','AdminController@show_bug_details');
    Route::get('/user_details/{id}','AdminController@show_user_details');
    Route::get('/user_edit/{id}', 'AdminController@edit_user');
    Route::put('/bug_edit/{id}','AdminController@edit_bug')->name('admin.bugs.update');
    Route::delete('/users/destroy/{id}', 'AdminController@userDelete')->name('admin.users.destroy');
    Route::delete('/bugs/destroy/{id}','AdminController@bugDelete')->name('admin.bugs.destroy');
   // Route::view('/user_reg','admin/user_reg');
});

Route::middleware(['auth'])->group(function () {
    Route::post('projects/adduser','ProjectsController@addtester')->name('projects.addtester');
    Route::get('bugs/create/{project_id?}', 'BugsController@create');
    Route::resource('projects', 'ProjectsController');
    Route::resource('bugs', 'BugsController');
    Route::resource('users', 'UsersController');
    Route::resource('comments','CommentsController');
    Route::get('bug_reports','ReportsController@bugs');
    Route::get('project_reports','ReportsController@projects');
    Route::get('pdfexport','ReportsController@pdf_export');
    Route::get('/dynamic_pdf/pdf','ReportsController@pdf');
});