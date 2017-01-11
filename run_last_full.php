<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

$maxer = new \Maxer\Maxer();
$maxer->login($username, $password);

$users = new \Maxer\API\Request\UserRequest();
$users = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 5));

foreach ($users as $user) {

    $photos = $maxer->getUserPhotos($users[0], 10);
    foreach ($photos as $photo) {
        $vouteResults = $maxer->setPhotoVoute($photo, 6);
        echo $vouteResults->getStatusCode();
        sleep(2);
    }
    sleep(10);
}
