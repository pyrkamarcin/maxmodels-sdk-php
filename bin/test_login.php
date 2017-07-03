<?php

require __DIR__ . '/../vendor/autoload.php';

$maxer = new \Maxer\Maxer();
$maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');

$lastPhoto = $maxer->getLastPhotos();
//dump($lastPhoto);

$token = $maxer->getToken();
dump($token->getBody()->getContents());
