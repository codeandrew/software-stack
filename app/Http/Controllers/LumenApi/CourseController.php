<?php

namespace App\Http\Controllers\LumenApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClientController;

class CourseController extends ClientController
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
