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
    return view('master');
});
Auth::routes();
// Users Routes
Route::get('/home', 'HomeController@index'); // Courses Page
Route::get('/profile', 'UserController@index'); // Profile Page
Route::get('/edit', 'UserController@edit'); // Edit Page
Route::post('/save', 'UserController@save'); // Save After Editing Post Request

// Social Logins (Facebook,Twitter,Google)
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider'); // For Social Logins
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback'); // Call Back

// Courses Routes
Route::get('/course', 'HomeController@course'); // Getting Course Page
Route::get('/courses', 'CoursesController@courses'); // Getting The Courses Page
Route::get('/courses/{keyword}', 'CoursesController@coursesSearch'); // Searching The Courses
Route::post('/courses/search', 'CoursesController@search'); // Search
Route::get('/coursep/{course_id}', 'CoursesController@index');
Route::get('/course/{course_id}', 'CoursesController@coursePage')->middleware('auth');

// Admin Routes
Route::get('/admin', 'AdminController@index'); // The Dashboard

Route::get('admin/courses', 'AdminController@courses'); // Getting Courses List
Route::get('admin/addCoursesPage', 'AdminController@addCoursesPage'); // Add Course Page
Route::post('admin/addCoursesPage','AdminController@addCourse'); // Add Course Function Post Request
Route::get('admin/editCourse/{course_id}', 'AdminController@editPage'); // Edit Course Page
Route::post('admin/editCourse', 'AdminController@editCourse'); // Edit Course Post Request
Route::post('admin/courseRemove','AdminController@courseRemove'); // Course Remove Function

Route::get('admin/users', 'AdminController@users'); // Getting Users For The Admin
Route::post('admin/users/admin', 'AdminController@makeAdmin'); // Make Admin Function
Route::post('admin/users/noadmin', 'AdminController@removeAdmin'); // Remove Admin Function
Route::post('admin/users/remove', 'AdminController@removeUser'); // Remove User Function

Route::post('admin/getVideoId', 'AdminController@getVideoId'); // To Get The Video ID
Route::get('admin/addQuestion', 'AdminController@addQuestionGet'); // Getting The Add Question Page

Route::post('admin/addQuestionToDB', 'AdminController@addQuestionToDB'); // Adding Question To The Database
