<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Check point 4 ,Register active mail, send mail reset password, edit profile,register course
Route::post('/login','Api\v1\AuthController@login');

Route::post('register', 'Api\v1\AuthController@register');
Route::get('activation/{code}', 'Api\v1\AuthController@active_account');

Route::post('forgot', 'Api\v1\PasswordResetController@store');
Route::get('reset-password', 'Api\v1\PasswordResetController@form_reset');
Route::post('reset', 'Api\v1\PasswordResetController@reset');


//check point 5
Route::prefix('v1')->group(function(){
	Route::middleware('auth:api')->group(function () {
    //profile student
		Route::group(['prefix'=>'profile'],function(){
		//show profile
			Route::get('show', 'Api\v1\StudentController@show');
		//update profile
			Route::post('update', 'Api\v1\StudentController@update');
		//change password profile
			Route::post('password', 'Api\v1\StudentController@updatePassword');
		//register for the course
			Route::post('register-course', 'Api\v1\RegisterCourseController@store');
		//check registered course
			Route::get('register-list', 'Api\v1\StudentController@show_register_list');
		});
	//logout
		Route::post('/logout','Api\v1\AuthController@logout');
	});
	//Fractal Transformer
	Route::get('course/list', 'Api\v1\CourseController@index');
	Route::get('class/list', 'Api\v1\ClassController@index');
	//Resource Transformer
	Route::get('student/list', 'Api\v1\StudentController@index');
	Route::get('registercourse/list', 'Api\v1\RegisterCourseController@index');
});

Route::prefix('v2')->group(function(){
	Route::middleware('auth:api')->group(function () {
    //profile student
		Route::group(['prefix'=>'profile'],function(){
		//show profile
			Route::get('show', 'Api\v2\StudentController@show');
		//update profile
			Route::post('update', 'Api\v2\StudentController@update');
		//change password profile
			Route::post('password', 'Api\v2\StudentController@updatePassword');
		//register for the course
			Route::post('register-course', 'Api\v2\RegisterCourseController@store');
		//check registered course
			Route::get('register-list', 'Api\v2\StudentController@show_register_list');
		});
	//logout
		Route::post('/logout','Api\v1\AuthController@logout');
	});
	//Fractal Transformer
	Route::get('course/list', 'Api\v2\CourseController@index');
	Route::get('class/list', 'Api\v2\ClassController@index');
	//Resource Transformer
	Route::get('student/list', 'Api\v2\StudentController@index');
	Route::get('registercourse/list', 'Api\v2\RegisterCourseController@index');
});