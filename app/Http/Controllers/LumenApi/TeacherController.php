<?php

namespace App\Http\Controllers\LumenApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends LumenController
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

    public function addTeacher(Request $request)
    {
      $req = $request->all();

      $data = [];
      $data['headers']['Authorization'] = 'Bearer ' . $req['token'];
      $data['form_params'] = $req['data'];

      $teachers = $this->performRequest('POST', "https://lumenapi.juandmegon.com/teachers", $data );

      return $teachers;
    }
}
