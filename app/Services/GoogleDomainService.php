<?php
namespace App\Services;

use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;

class GoDaddyService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $clientId;

    protected $clientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.google_domainy.base_uri');
        $this->clientId = config('services.google_domain.api_key');
        $this->clientSecret = config('services.google_domain.secret');
    }
    public function resolveAuthorization(&$queryParams,&$formParams,&$headers)
    {
        $headers['Authorization']= $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");

        return "BASIC {$credentials}";
    }

    public function domainList()
    {
        $response = $this->makeRequest('GET','/v1/domains',[]);
    }
}