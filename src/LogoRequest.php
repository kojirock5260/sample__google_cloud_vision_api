<?php

namespace Kojirock\GoogleCloudVisionApiSample;

class LogoRequest extends BaseRequest
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
                    ["type" => "LOGO_DETECTION"]
                ]
            ]]
        ]);
    }

    protected function returnResponse(array $responseData)
    {
        $results = [];
        if (!isset($responseData['responses'][0]['logoAnnotations'])) {
            return $results;
        }

        $responseArray           = $responseData['responses'][0]['logoAnnotations'][0];
        $results['description']  = $responseArray['description'];
        $results['score']        = $responseArray['score'];
        $results['boundingPoly'] = $responseArray['boundingPoly']['vertices'];
        return $results;
    }
}