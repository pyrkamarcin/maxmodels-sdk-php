<?php

class MaxerTest extends PHPUnit_Framework_TestCase
{
    public function testLoginAndGetToken()
    {
        $maxer = new \Maxer\Maxer();

        $maxer->login('', '');
        $token = $maxer->getToken();

        $this->assertTrue(is_string($token));
    }
}
