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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('phub-login', 'PerahubController@login');
Route::post('mock-login', 'StaticPerahubController@login');
Route::post('mock-register', 'StaticPerahubController@register');

Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');

//LumenApi
Route::get('students', 'LumenApi\StudentController@getAllStudents');
Route::get("students/{id}", 'LumenApi\StudentController@getOneStudent');

Route::get('teachers', 'LumenApi\TeacherController@getAllTeachers');
Route::get("teachers/{id}", 'LumenApi\TeacherController@getOneteacher');
Route::post("teachers/add", 'LumenApi\TeacherController@addTeacher');

Route::get('courses', 'LumenApi\CourseController@getAllCourses');
Route::get('courses/{id}', 'LumenApi\CourseController@getOneCourse');

Route::get('token', 'LumenApi\LumenController@obtainAccessToken');

//Protected Routes
Route::group(['middleware'=>'auth:api'], function(){
  Route::get('profile', 'API\PassportController@getProfile');
  Route::get('contact-info', 'API\PassportController@getContactInformation');
  Route::post('students/add', 'LumenApi\StudentController@addStudent');
});
