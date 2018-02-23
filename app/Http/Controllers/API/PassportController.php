<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Resources\ContactInformation;

class PassportController extends Controller
{
  //
  public $successStatus;

  public function __construct()
  {
    $this->successStatus = 200;
  }

  public function register(Request $request){
    //
    $validator = Validator::make($request->all(), [
      'fname' => 'required',
      'lname' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'c_password' => 'required|same:password',
      'mobile' => 'required'
    ]);

    if ($validator->fails()){
      return response()->json(['error' => $validator->errors()], 401);
    }

    //success
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);// encrypted the password
    $user = User::create($input);
    $success = [
      'token' => $user->createToken('Laravel')->accessToken,
      'email' => $user->email
    ];

    return response()->json([
      'success'=> $success,
      'status_code' => $this->successStatus,
      'status_message' => 'success'
    ]);


  }

  public function login(Request $request) {

    //try logging in the user
    $authSuccess = Auth::attempt([
      'email'=>$request->input('email'),
      'password'=> $request->input('password')
    ]);

    if ($authSuccess) {
        $user = Auth::user();

        $success = [
          'token' => $user->createToken('Laravel')->accessToken,
          'email' => $user->email
        ];

        return response()->json([
          'data'=> $success,
          'status_code' => $this->successStatus,
          'status_message' => 'success'
        ]);
      }

      //return error
      return response()->json(['error' => 'unauthorized'], 401);

    }

    public function getProfile(){
      $success = Auth::user();

      return response()->json([
        'data'=> $success,
        'status_code' => $this->successStatus,
        'status_message' => 'success'
      ]);
    }

    public function getContactInformation(){
      return new ContactInformation(Auth::user());
    }

}
