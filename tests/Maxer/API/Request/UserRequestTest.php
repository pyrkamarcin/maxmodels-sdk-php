<?php

/**
 * Class UserRequestTest
 */
class UserRequestTest extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    public function testUserRequest()
    {
        $users = new \Maxer\API\Request\UserRequest();
        $users->execute();
        $response = $users->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}
