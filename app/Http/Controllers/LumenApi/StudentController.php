<?php

namespace App\Http\Controllers\LumenApi;

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;

class StudentController extends ClientController
{
    //
    public function getAllStudents()
    {
      $students = $this->performRequest('GET', 'https://lumenapi.juandmegon.com/students' );

      return $students;
    }

    public function getOneStudent($id)
    {
      $student = $this->performRequest('GET', "https://lumenapi.juandmegon.com/students/{$id}" );

      return $student;
    }

    public function addStudent(Request $request)
    {
      $student = $this->authorizedRequest('POST', "https://lumenapi.juandmegon.com/students", $request->all() );

      return $student;
    }
}
