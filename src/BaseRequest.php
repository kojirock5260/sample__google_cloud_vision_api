<?php

namespace Kojirock\GoogleCloudVisionApiSample;

abstract class BaseRequest
{
    const BASE_URL = "https://vision.googleapis.com";

    private $client    = null;
    private $apiKey    = null;
    private $imagePath = null;

    /**
     * BaseRequest constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new RequestClient(self::BASE_URL);
    }

    /**
     * @param string $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    /**
     * @return string
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * exec request
     * @return array
     */
    public function call()
    {
        $requestJson  = $this->getRequestJson();
        $path         = "/v1/images:annotate?key=" . $this->apiKey;
        $responseData = $this->client->call($path, $requestJson);

        return $this->returnResponse($responseData);
    }

    abstract protected function getRequestJson();
    abstract protected function returnResponse(array $responseData);
}