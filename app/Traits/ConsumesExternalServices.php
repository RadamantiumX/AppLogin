<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    public function makeRequest($method,$requestURL, $queryParams=[],$formParams=[],$headers=[],$isJsonRequest=false)
    {
        $client = new Client([
            'base_uri'=>$this->baseUri,
        ]);
        if(method_exists($this,'resolveAuthorization')){
            $this->resolveAuthorization($queryParams, $formParams,$headers);
        }
        $response = $client->request($method,$requestURL,[
                             $isJsonRequest?'json':'form_params'=>$formParams,
                             'headers'=>$headers,
                             'query'=>$queryParams,
                            ]);

        $response = $response->getBody()->getContents(); 
        
        if(method_exists($this,'decodeResponse')){
            $response = $this->decodeResponse($response);
        }

        return $response;
    }
}