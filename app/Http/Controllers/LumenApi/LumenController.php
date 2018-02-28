<?php

namespace App\Http\Controllers\LumenApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClientController;

class LumenController extends ClientController
{
    protected function obtainAccessToken()
    {
      $grantType = config('api.grant_type');
      $clientId = config('api.client_id');
      $clientSecret = config('api.client_secret');

      $contents = $this->performRequest('POST', 'https://lumenapi.juandmegon.com/oauth/access_token',
        ['form_params' => [
            'grant_type' => $grantType,
            'client_id' => $clientId,
            'client_secret' => $clientSecret
          ]
        ]
      );

      $decodedContents = json_decode($contents);

      return $decodedContents->access_token;
    }

    protected function authorizedRequest($method, $url, $formParameters = [])
    {
      $requestParameters['form_params'] = $formParameters;

      $accessToken = 'Bearer ' . $this->obtainAccessToken();

      $requestParameters['headers']['Authorization'] = $accessToken;

      return $this->performRequest($method, $url, $requestParameters);

    }
}
