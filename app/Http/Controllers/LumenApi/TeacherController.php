<?php

namespace App\Http\Controllers\LumenApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClientController;

class TeacherController extends ClientController
{
    //
    public function getAllTeachers()
    {
      $teachers = $this->performRequest('GET', 'https://lumenapi.juandmegon.com/teachers' );

      return $teachers;
    }

    public function getOneTeacher($id)
    {
      $teachers = $this->performRequest('GET', "https://lumenapi.juandmegon.com/teachers/{$id}" );

      return $teachers;
    }
}
