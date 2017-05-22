<?php

/**
 * Class UserResponseTest
 */
class UserResponseTest extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    public function testParseNormalLimit()
    {
        $users = new \Maxer\API\Request\UserRequest();

        $array = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 8));

        $this->assertCount(8, $array);
    }

    /**
     *
     */
    public function testParseMinLimit()
    {
        $users = new \Maxer\API\Request\UserRequest();

        $array = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 1));

        $this->assertCount(1, $array);
    }

    /**
     *
     */
    public function testParseMaxLimit()
    {
        $users = new \Maxer\API\Request\UserRequest();

        $array = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 30));

        $this->assertCount(30, $array);
    }

    /**
     *
     */
    public function testParseOverLimit()
    {
        $users = new \Maxer\API\Request\UserRequest();

        $array = \Maxer\API\Response\UserResponse::toObjects(\Maxer\API\Response\UserResponse::parse($users->execute(), 50));

        $this->assertCount(30, $array);
    }
}
