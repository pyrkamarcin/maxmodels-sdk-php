<?php

/**
 * Class MaxerTest
 */
class MaxerTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testLoginGetOnePhotoAndVoute()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');
        $photos = $maxer->getLastPhotos(1);

        $vouteResults = $maxer->setPhotoVoute($photos[0], 5);
        $vouteResults->getStatusCode();

        $this->assertEquals(200, $vouteResults->getStatusCode());
    }

    /**
     *
     */
    public function testLoginGetPhotos()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');
        $photos = $maxer->getLastPhotos(5);

        $this->assertCount(5, $photos);
    }


    /**
     *
     */
    public function testLoginGetObservedPhotos()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');
        $photos = $maxer->getObservedtPhotos(3);

        $this->assertCount(3, $photos);
    }

    /**
     *
     */
    public function testLoginGetPhotoAndValidateId()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');
        $photos = $maxer->getLastPhotos(1);

        $photo = $photos[0];

        $this->assertEquals(true, is_string($photo->getId()));
    }

    /**
     *
     */
    public function testGetUserPhoto()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');

        $users = new \Maxer\API\Request\UserRequest();
        $users = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 8));

        $photos = $maxer->getUserPhotos($users[2], 3);
        $this->assertCount(3, $photos);
    }
}
