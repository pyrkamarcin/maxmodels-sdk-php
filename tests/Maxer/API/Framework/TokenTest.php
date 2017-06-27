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
        $maxer->login('nuzikodam@zainmax.net', 'xu?azeq5@raK');

        $token = new \Maxer\API\Framework\Token();

        dump($token->getValue());
        $this->assertTrue(is_string($token->getValue()));
    }
}
