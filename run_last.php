<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

$maxer = new \Maxer\Maxer();
$maxer->login($username, $password);
$photos = $maxer->getLastPhotos(10);

foreach ($photos as $photo) {

    dump($photo);

    $vouteResults = $maxer->setPhotoVoute($photo, 6);

    dump($vouteResults->getBody()->getContents());

    sleep(2);
}
