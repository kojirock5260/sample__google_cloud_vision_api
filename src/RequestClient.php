<?php

namespace Kojirock\GoogleCloudVisionApiSample;

class RequestClient
{
    private $guzzleClient = null;
    private $headers      = [
        'User-Agent' => 'kojirock google-cloud-vision-api requedst',
        'Accept'     => 'application/json'
    ];

    public function __construct($url)
    {
        $this->guzzleClient = new \GuzzleHttp\Client(['base_uri' => $url]);
    }

    public function call($path, $requestJson)
    {
        $response = $this->guzzleClient->request('POST', $path, [
            'headers' => $this->headers,
            'body'    => $requestJson
        ]);

        $responseBody = (string)$response->getBody();
        return json_decode($responseBody, true);
    }
}