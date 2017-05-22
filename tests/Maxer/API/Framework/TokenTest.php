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
        $token = new \Maxer\API\Framework\Token();

        $this->assertTrue(is_string($token->getValue()));
    }
}
