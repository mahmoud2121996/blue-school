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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/courses', 'CoursesController@index')->name('coursesIndex')->middleware(['auth','verified']);

Route::group(
    [
        'middleware' => 'is_student'
    ]
    ,
    function (){
        Route::post('/courses/enroll', 'EnrollmentsController@store')->name('enrollCourse');
        Route::delete('/courses/drop', 'EnrollmentsController@destroy')->name('dropCourse');
});




Route::group(
    [
        'middleware' => 'is_admin'
    ]
    ,
    function (){

        Route::get('/courses/create', 'CoursesController@create')->name('createCourse');
        Route::get('/courses/{id}/edit', 'CoursesController@edit')->name('editCourse');
        Route::post('/courses', 'CoursesController@store')->name('storeCourse');
        Route::put('/courses/{id}', 'CoursesController@update')->name('updateCourse');
        Route::delete('/courses/{id}', 'CoursesController@destroy')->name('deleteCourse');

});


