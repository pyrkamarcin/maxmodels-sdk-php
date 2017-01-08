<?php

class MaxerTest extends PHPUnit_Framework_TestCase
{
    public function testLoginGetOnePhotoAndVoute()
    {
        require('config.php');

        $maxer = new \Maxer\Maxer();
        $maxer->login($username, $password);
        $photos = $maxer->getLastPhotos(1);

        $vouteResults = $maxer->vouter($photos[0]);
        $vouteResults->getStatusCode();

        $this->assertEquals(200, $vouteResults->getStatusCode());
    }

    public function testLoginGetPhotos()
    {
        require('config.php');

        $maxer = new \Maxer\Maxer();
        $maxer->login($username, $password);
        $photos = $maxer->getLastPhotos(5);

        $this->assertCount(5, $photos);
    }
}
