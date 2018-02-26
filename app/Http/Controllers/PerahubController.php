<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerahubController extends ClientController
{
    //
    public $signin;

    public function __construct(){
      $this->signin = [
        "uspwuapi" => [
          "header" => [
            'coy' => 'yondu',
            'token' => '8243fdccc53a32f28edb6eda1975dfbd',
            'location_code' => '1',
            'user_code' => '1',
            'clientip' => '120.29.117.208',
            'isweb' => '1',
          ],
          'body' => [
            'module' => 'signin',
            'request' => 'login',
            'param' => [
              'username' => 'RN052480W',
              'password' => '6700713fac9f035fbc0cf5e9e0b245dd4eea74e930530f0faf0993446435bc298c8fc9c6f35e6c0a741a88490db2735e758810288025c700bf5fa72c775ddf08',
              'category' => 'asdf',
            ]
          ],
          'signature' => 'anyvaluesfonow'
        ]
      ];
    }

    public function login()
    {
     $success = $this->performRequest('POST', 'http://devgateway.perahub.com.ph/gateway/signin',['json' => $this->signin] );

     return $success;
    }
}
