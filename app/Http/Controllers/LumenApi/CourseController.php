<?php

namespace App\Http\Controllers\LumenApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends LumenController
{
    //
    public function getAllCourses()
    {
      $courses = $this->performRequest('GET', 'https://lumenapi.juandmegon.com/courses' );

      return $courses;
    }

    public function getOneCourse($id)
    {
      $courses = $this->performRequest('GET', 'https://lumenapi.juandmegon.com/courses' );

      $singleCourse = json_decode($courses);

      return json_encode($singleCourse->data[--$id]);
    }
}
