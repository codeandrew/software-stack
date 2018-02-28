<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPerahubController extends ClientController
{
    //
    public $signin;

      // public function __construct(){
      //   $this->signin = [
      //     "uspwuapi" => [
      //       "header" => [
      //         'coy' => 'yondu',
      //         'token' => '8243fdccc53a32f28edb6eda1975dfbd',
      //         'location_code' => '1',
      //         'user_code' => '1',
      //         'clientip' => '120.29.117.208',
      //         'isweb' => '1',
      //       ],
      //       'signature' => 'anyvaluesfonow'
      //     ]
      //   ];
      // }
    public function perahubRequest($method, $path, $body){
      $data['uspwuapi'] = [
          "header" => [
            'coy' => 'yondu',
            'token' => '8243fdccc53a32f28edb6eda1975dfbd',
            'location_code' => '1',
            'user_code' => '1',
            'clientip' => '120.29.117.208',
            'isweb' => '1',
          ],
          'body' => $body,
          'signature' => 'any value for now'
      ];
      dump($data);
       $success = $this->performRequest( $method, "http://devgateway.perahub.com.ph/gateway/$path",['json' => $data] );

       return $success;
    }


    public function login()
    {
     $body = [
       'module' => 'signin',
       'request' => 'login',
       'param' => [
         'username' => 'RN052480W',
         'password' => '6700713fac9f035fbc0cf5e9e0b245dd4eea74e930530f0faf0993446435bc298c8fc9c6f35e6c0a741a88490db2735e758810288025c700bf5fa72c775ddf08',
         'category' => 'asdf',
       ]
     ];
     $success = $this->perahubRequest('POST','signin', $body);
     return $success;
    }

    public function register()
    {
     $body = [
       'module' => 'Registration',
       'request' => 'Register',
       'param' => [
         'username' => 'wcacc1',
         'mobile' => '09171234567',
         'email' => 'test@gmail.com',
         'surname'=> 'blank',
         'givenname'=> 'Ian Eris',
         'middlename' => 'Migs',
         'password' => hash('sha512','password'),
         'Birthdate' => '10/15/1977',
         'Nationality' => 'fil',
         'PresentAddress' => 'manila',
         'PermanentAddress' => 'qc',
         'Occupation' => 'developer',
         'NameOfEmployer' => 'voc dei',
         'SecurityQuestion1' => 'number 1?',
         'Answer1' => '1',
         'SecurityQuestion2' => 'number 2?',
         'Answer2' => '2',
         'SecurityQuestion3' => 'number 3?',
         'Answer3' => '3',
         'ValidIdentification' => 'drivers license',
         'photo' => '',
         'WuCardNo' => '123',
         'DebitCardNo' => '123',
         'LoyaltyCardNo' => '123',
       ]
     ];

     $success = $this->perahubRequest('POST','Registration', $body);
     return $success;
    }
}
