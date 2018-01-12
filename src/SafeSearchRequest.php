<?php

namespace Kojirock\GoogleCloudVisionApiSample;

class SafeSearchRequest extends BaseRequest
{
    protected function getRequestJson()
    {
        $contents = base64_encode(file_get_contents($this->getImagePath()));
        return json_encode([
            "requests" => [[
                "image" => [
                    "content" => $contents
                ],
                "features" => [
                    ["type" => "SAFE_SEARCH_DETECTION"]
                ]
            ]]
        ]);
    }

    protected function returnResponse(array $responseData)
    {
        $results = [];
        if (!isset($responseData['responses'][0]['safeSearchAnnotation'])) {
            return $results;
        }

        return $responseData['responses'][0]['safeSearchAnnotation'];
    }
}