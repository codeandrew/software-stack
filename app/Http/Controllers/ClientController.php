<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use HttpClient\Http\Requests;



class ClientController extends Controller
{

  protected function performRequest($method, $url, $parameters = [])
  {
    $client = new Client([
      // 'base_uri' => 'http://127.0.0.1:8000'
      // 'base_uri' => 'http://10.19.13.27:8000',
      'curl' => [ CURLOPT_CAINFO => base_path('resources/certs/cacert.pem') ]
      ]
    );
    $response = $client->request($method, $url, $parameters);
    return $response->getBody()->getContents();
  }

}
