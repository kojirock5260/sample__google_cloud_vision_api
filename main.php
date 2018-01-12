<?php

require_once './vendor/autoload.php';

$apiKey    = "";
$imagePath = "";

$request = new \Kojirock\GoogleCloudVisionApiSample\LabelRequest($apiKey);
// $request = new \Kojirock\GoogleCloudVisionApiSample\SafeSearchRequest($apiKey);
// $request = new \Kojirock\GoogleCloudVisionApiSample\TextRequest($apiKey);
// $request = new \Kojirock\GoogleCloudVisionApiSample\LandmarkRequest($apiKey);
// $request = new \Kojirock\GoogleCloudVisionApiSample\LogoRequest($apiKey);
// $request = new \Kojirock\GoogleCloudVisionApiSample\FaceRequest($apiKey);

$request->setImagePath($imagePath);
$results = $request->call();
var_dump($results);
