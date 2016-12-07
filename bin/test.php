<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

$maxer = new \Maxer\Maxer();

$maxer->login($username, $password);
$photos = $maxer->getLastPhotos(5);
$vouteResults = $maxer->vouter($photos);
