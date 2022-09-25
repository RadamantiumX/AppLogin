<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DomainController extends Controller
{


    protected $url;

    public function __construct()
    {
        $this->url = config('services.domain.url');
    }

    public function details(Request $request){

       $domain = $request->input('domain');

       $response = Http::withHeaders([
         'accept'=> 'application/json',
         'Authorization'=>'sso-key UzQxLikm_46KxDFnbjN7cQjmw6wocia:46L26ydpkwMaKZV6uVdDWe',
         'Content-Type'=>'application/json',
       ])->
       post('https://api.ote-godaddy.com/v1/domains/available',[
           $domain
       ])->json()['domains'];

       dump($response);

       return view('welcome',[
       'response'=>$response,
       ]
    );
    }

}
