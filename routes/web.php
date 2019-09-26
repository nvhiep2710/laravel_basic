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
//CMS QUAN LÝ CỦA ADMIN
//login
Route::get('/home',function(){
	return redirect()->route('country.index');
});
Route::get('/','Auth\LoginController@index')->name('login');
Route::post('/login','Auth\LoginController@login')->name('admin.auth.login');

//logout
Route::get('/logout','Auth\LoginController@logout')->name('admin.auth.logout');

//
Route::group(['middleware'=>'auth:admin'],function(){
	//manage country
	Route::group(['prefix'=>'country'],function(){
		Route::get('/getlist','Admin\CountryController@index')->name('country.index');
		Route::get('/get-insert','Admin\CountryController@create')->name('country.create');
		Route::post('/insert','Admin\CountryController@store')->name('country.store');
		Route::get('/get-update/{country}','Admin\CountryController@edit')->name('country.edit');
		Route::post('/update/{country}','Admin\CountryController@update')->name('country.update');
		Route::get('/delete/{country}','Admin\CountryController@destroy')->name('country.detroy');
	});
	//manage course
	Route::group(['prefix'=>'course'],function(){
		Route::get('/getlist','Admin\CourseController@index')->name('course.index');
		Route::get('/form-insert','Admin\CourseController@create')->name('course.create');
		Route::post('/insert','Admin\CourseController@store')->name('course.store');
		Route::get('/show/{id}','Admin\CourseController@show')->name('course.show');
		Route::get('/form-update/{country}','Admin\CourseController@edit')->name('course.edit');
		Route::post('/update/{country}','Admin\CourseController@update')->name('course.update');
		Route::get('/delete/{country}','Admin\CourseController@destroy')->name('course.detroy');
	});
	//manage class
	Route::group(['prefix'=>'class'],function(){
		Route::get('/getlist','Admin\ClassController@index')->name('class.index');
		Route::get('/form-insert','Admin\ClassController@create')->name('class.create');
		Route::post('/insert','Admin\ClassController@store')->name('class.store');
		Route::get('/show/{id}','Admin\ClassController@show')->name('class.show');
		Route::get('/form-update/{country}','Admin\ClassController@edit')->name('class.edit');
		Route::post('/update/{country}','Admin\ClassController@update')->name('class.update');
		Route::get('/delete/{country}','Admin\ClassController@destroy')->name('class.detroy');
	});
	//manage student
	Route::group(['prefix'=>'student'],function(){
		Route::get('/getlist','Admin\StudentController@index')->name('student.index');
	});
	//manage register course
	Route::group(['prefix'=>'registercourse'],function(){
		Route::get('/getlist','Admin\RegisterCourseController@index')->name('registercourse.index');
	});
});
