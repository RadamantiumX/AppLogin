<?php

namespace App\Http\Controllers;

use App\Traits\ConsumesExternalServices;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    use ConsumesExternalServices;

    protected $url;

    public function __construct()
    {
        $this->url = config('services.domain.url');
    }

    public function whoisDetails($domain){

        $consulta = Http::withHeaders([
            'X-RapidAPI-Key'=> 'a69854d087mshbb6c40a3be79322p13d765jsnfc63de23fdea',
            'X-RapidAPI-Host'=> 'domain-checker7.p.rapidapi.com'
        ])->get($this->url.'?domain='.$domain)->json();

        dump($consulta);

        return view('welcome');
    }
}
