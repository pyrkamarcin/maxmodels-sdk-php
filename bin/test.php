<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

$maxer = new \Maxer\Maxer();

$maxer->login($username, $password);
$result = $maxer->vouter($maxer->getLastPhotos(5));
