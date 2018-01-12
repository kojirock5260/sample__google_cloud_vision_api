<?php

namespace Kojirock\GoogleCloudVisionApiSample;

class LandmarkRequest extends BaseRequest
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
                    ["type" => "LANDMARK_DETECTION"]
                ]
            ]]
        ]);
    }

    protected function returnResponse(array $responseData)
    {
        $results = [];
        if (!isset($responseData['responses'][0]['landmarkAnnotations'])) {
            return $results;
        }

        $responseArray           = $responseData['responses'][0]['landmarkAnnotations'][0];
        $results['description']  = $responseArray['description'];
        $results['score']        = $responseArray['score'];
        $results['boundingPoly'] = $responseArray['boundingPoly']['vertices'];
        $results['locations']    = $responseArray['locations'][0]['latLng'];
        return $results;
    }
}