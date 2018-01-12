<?php

namespace Kojirock\GoogleCloudVisionApiSample;

class LabelRequest extends BaseRequest
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
                        "type" => "LABEL_DETECTION",
                        "maxResults" => self::MAX_RESULTS
                    ]
                ]
            ]]
        ]);
    }

    protected function returnResponse(array $responseData)
    {
        $results = [];
        if (!isset($responseData['responses'][0]['labelAnnotations'])) {
            return $results;
        }

        $responseArray = $responseData['responses'][0]['labelAnnotations'];
        foreach ($responseArray as $key => $data) {
            $results[$key]['description'] = $data['description'];
            $results[$key]['score']       = $data['score'];
        }

        return $results;
    }
}