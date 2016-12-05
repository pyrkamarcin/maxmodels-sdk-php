<?php

/**
 * Class TokenTest
 */
class TokenTest extends PHPUnit_Framework_TestCase
{
    public function testGetToken()
    {
        $token = new \Maxer\API\Framework\Token();

        $this->assertTrue(is_string($token->getValue()));
    }
}
