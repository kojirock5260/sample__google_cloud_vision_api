# google cloud vision apiのサンプルプログラムです。


## ラベル検出

```
$request = new \Kojirock\GoogleCloudVisionApiSample\LabelRequest($apiKey);
$request->setImagePath($imagePath);
$results = $request->call();
```


## 光学式文字認識

```
$request = new \Kojirock\GoogleCloudVisionApiSample\TextRequest($apiKey);
$request->setImagePath($imagePath);
$results = $request->call();
```

## 不適切なコンテンツの検出

```
$request = new \Kojirock\GoogleCloudVisionApiSample\SafeSearchRequest($apiKey);
$request->setImagePath($imagePath);
$results = $request->call();
```

## 顔検出

```
$request = new \Kojirock\GoogleCloudVisionApiSample\FaceRequest($apiKey);
$request->setImagePath($imagePath);
$results = $request->call();
```

## ロゴ検出

```
$request = new \Kojirock\GoogleCloudVisionApiSample\LogoRequest($apiKey);
$request->setImagePath($imagePath);
$results = $request->call();
```

## ランドマーク検出

```
$request = new \Kojirock\GoogleCloudVisionApiSample\LandmarkRequest($apiKey);
$request->setImagePath($imagePath);
$results = $request->call();
```