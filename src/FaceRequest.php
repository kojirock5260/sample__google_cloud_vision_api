<?php

namespace Kojirock\GoogleCloudVisionApiSample;

class FaceRequest extends BaseRequest
{
    const MAX_RESULTS = 5;

    protected function getRequestJson()
    {
        $contents = base64_encode(file_get_contents($this->getImagePath()));
        return json_encode([
            "requests" => [[
                "image" => [
                    "content" => $contents
                ],
                "features" => [
                    [
                        "type" => "FACE_DETECTION",
                        "maxResults" => self::MAX_RESULTS
                    ]
                ]
            ]]
        ]);
    }

    protected function returnResponse(array $responseData)
    {
        $results = [];
        if (!isset($responseData['responses'][0]['faceAnnotations'])) {
            return $results;
        }

        $responseArray = $responseData['responses'][0]['faceAnnotations'];
        foreach ($responseArray as $key => $data) {
            $results[$key]['boundingPoly']           = $data['boundingPoly']['vertices'];
            $results[$key]['fdBoundingPoly']         = $data['fdBoundingPoly']['vertices'];
            $results[$key]['landmarks']              = $data['landmarks'];
            $results[$key]['detectionConfidence']    = $data['detectionConfidence'];
            $results[$key]['landmarkingConfidence']  = $data['landmarkingConfidence'];
            $results[$key]['joyLikelihood']          = $data['joyLikelihood'];
            $results[$key]['sorrowLikelihood']       = $data['sorrowLikelihood'];
            $results[$key]['angerLikelihood']        = $data['angerLikelihood'];
            $results[$key]['surpriseLikelihood']     = $data['surpriseLikelihood'];
            $results[$key]['underExposedLikelihood'] = $data['underExposedLikelihood'];
            $results[$key]['blurredLikelihood']      = $data['blurredLikelihood'];
            $results[$key]['headwearLikelihood']     = $data['headwearLikelihood'];
        }

        return $results;
    }
}