<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function details(Request $request)
    {

       $domain = $request->input('domain');

       $responses = Http::withHeaders([
         'accept'=> 'application/json',
         'Authorization'=>'sso-key UzQxLikm_46KxDFnbjN7cQjmw6wocia:46L26ydpkwMaKZV6uVdDWe',
         'Content-Type'=>'application/json',
       ])->
       post('https://api.ote-godaddy.com/v1/domains/available',[
           $domain
       ])->json()['domains'];

       //dump($responses);

       return view('welcome',[
       'responses' => $responses
       ]);


    }
    public function suggest(){

    }
}
