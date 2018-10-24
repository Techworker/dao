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

Route::get('/', 'IndexController@index')->name('home');
Route::get('/projects', 'IndexController@index')->name('projects');
Route::get('/projects/{project}', 'IndexController@project')->name('project_detail');
Route::get('/users/{user}', 'IndexController@user')->name('user_detail');

Route::post('/projects/comment/{project}', 'IndexController@addComment')->name('project_add_comment')->middleware('auth');

Route::get ('/profile', 'IndexController@profile')->name('profile')->middleware('auth');

Route::post('/profile/project', 'IndexController@projectAdd')->name('profile_project_add')->middleware('auth');
Route::post('/profile/project/{id}', 'IndexController@projectUpdate')->name('profile_project_edit')->middleware('auth');

Route::post('/profile/kyc', 'IndexController@kycAdd')->name('profile_kyc_add')->middleware('auth');
Route::get ('/profile/kyc/remove/{id}', 'IndexController@kycRemove')->name('profile_kyc_remove')->middleware('auth');

Route::post('/profile/contact', 'IndexController@profileUpdateContact')->name('profile_update_contact')->middleware('auth');
Route::post('/profile/login', 'IndexController@profileUpdateLogin')->name('profile_update_login')->middleware('auth');

Route::get('/transparency', 'IndexController@transparency')->name('transparency');
Route::get('/contact', 'IndexController@contact')->name('contact');


Auth::routes();
