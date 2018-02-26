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
}
