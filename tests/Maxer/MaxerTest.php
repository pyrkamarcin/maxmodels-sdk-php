<?php

class MaxerTest extends PHPUnit_Framework_TestCase
{
    public function testLoginAndGetToken()
    {
        $maxer = new \Maxer\Maxer();

        $maxer->login('', '');
        $token = new \Maxer\API\Framework\Token();

        $this->assertTrue(is_string($token->getValue()));
    }
}
