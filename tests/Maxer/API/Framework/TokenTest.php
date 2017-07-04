<?php

/**
 * Class TokenTest
 */
class TokenTest extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    public function testGetToken()
    {
        $maxer = new \Maxer\Maxer();
        $maxer->login('jaseca@vektik.com', 'W/K8^4h-GD"C3a?X');

        $token = new \Maxer\API\Framework\Token();
        $this->assertEquals(32, strlen($token->getValue()));
    }
}
