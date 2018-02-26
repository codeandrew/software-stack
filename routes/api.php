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

// Route::post('phub-login', 'ClientController@login');
Route::post('phub-login', 'PerahubController@login');

Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');

//LumenApi
Route::get('students', 'LumenApi\StudentController@getAllStudents');
Route::get("students/{id}", 'LumenApi\StudentController@getOneStudent');

Route::get('teachers', 'LumenApi\TeacherController@getAllTeachers');
Route::get('courses', 'LumenApi\CourseController@getAllCourses');

//Protected Routes
Route::group(['middleware'=>'auth:api'], function(){
  Route::get('profile', 'API\PassportController@getProfile');
  Route::get('contact-info', 'API\PassportController@getContactInformation');
});
