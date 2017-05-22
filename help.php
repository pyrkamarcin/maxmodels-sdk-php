<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

$dumper = new \Awesomite\VarDumper\LightVarDumper();
$maxer = new \Maxer\Maxer();

$resultAfterLogin = $maxer->login($username, $password);

$lastPhoto = $maxer->getLastPhotos(45);

$token = new \Maxer\API\Framework\Token();

$voute = new \Maxer\API\Request\VoutePhotoRequest($token, $lastPhoto[8]);
$dumper->dump($voute->getBody());
$dumper->dump($voute->execute()->getBody()->getContents());
