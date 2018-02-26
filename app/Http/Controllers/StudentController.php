<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends ClientController
{
    //
    public function getAllStudents()
    {
      $students = $this->performRequest('GET', 'https://lumenapi.juandmegon.com/students' );

      return $students;
    }
}
