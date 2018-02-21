<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportController extends Controller
{
    //
    public $successStatus = 200;

    public function register(Request $request){
      //
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password'
      ]);

      if ($validator->fails()){
        return response()->json(['error' => $validator->errors(), 401]);
      }

      //success
      $input = $request->all();
      $input['password'] = bcrypt();// encrypted the password
      $user = User::create($input);
      $success['token'] = $user->createToken('WebServiceApp')->accessToken;
      $success['name'] = $user->name;

      return response()->json(['success'=> $success], $this->$successStatus);


    }

    public function login(Request $request){

    }
}
