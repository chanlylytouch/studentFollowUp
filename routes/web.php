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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'StudentController@index')->name('home');
Route::get('/back','StudentController@back')->name('back');
Route::post('addStudent', 'StudentController@store')->name('addStudent');
Route::get('editStudent/{student}', 'StudentController@edit')->name('editStudent');
Route::put('updateStudent/{student}', 'StudentController@update')->name('updateStudent');
// Route::get('updateActive/{id}', 'StudentController@updateActiveFollowup')->name('updateActive');
// Route::get('backActive/{id}', 'StudentController@backActiveFollowup')->name('backActive');
Route::get('viewStudent/{student}','StudentController@show')->name('viewStudent');
//comment route
Route::get('show','CommentController@index')->name('show');
Route::get('showcomment/{id}','CommentController@show')->name('showcomment');
Route::post('addcomment/{id}','CommentController@store')->name('addcomment');
Route::put('edit/{id}','CommentController@update')->name('edit');
Route::get('delete/{id}','CommentController@destroy')->name('delete');