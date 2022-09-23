<?php

namespace App\Http\Controllers;

use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    use ConsumesExternalServices;

    protected $url;
}
