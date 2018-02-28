<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerahubController extends ClientController
{

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

  public function getBodyParam($module, $request, $param)
  {
   $body = [
     'module' => $module,
     'request' => $request,
     'param' => $param
   ];

   return $body;
  }

  public function login(Request $request)
  {
    $param = $request->all();

    $body = $this->getBodyParam('signin', 'login', $param);
    $success = $this->perahubRequest('POST','signin', $body);

    return $success;
  }
}
