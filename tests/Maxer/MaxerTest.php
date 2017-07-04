<?php

/**
 * Class MaxerTest
 */
class MaxerTest extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    public function testGetUserPhoto()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('jaseca@vektik.com', 'W/K8^4h-GD"C3a?X');

        $users = new \Maxer\API\Request\UserRequest();
        $users = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 4));

        $photos = $maxer->getUserPhotos($users[2], 3);
        $this->assertTrue(count($photos) <= 3);
    }
}
