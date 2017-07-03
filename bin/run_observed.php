<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

$dumper = new \Awesomite\VarDumper\LightVarDumper();
$maxer = new \Maxer\Maxer();

$maxer->login($username, $password);

$photos = $maxer->getObservedPhotos(12);

foreach ($photos as $photo) {
    $vouteResults = $maxer->setPhotoVoute($photo, 6);
    dump($vouteResults->getBody()->getContents());
}
