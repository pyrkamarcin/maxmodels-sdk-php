<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

$maxer = new \Maxer\Maxer();

$maxer->login($username, $password);

$photos = $maxer->getObservedtPhotos(12);
foreach ($photos as $photo) {
    $vouteResults = $maxer->vouter($photo);
    echo $vouteResults->getStatusCode();
    sleep(30);
}
