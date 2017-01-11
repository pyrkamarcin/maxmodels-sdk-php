<?php

/**
 * Class LastPhotosRequestTest
 */
class LastPhotosRequestTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testLastPhotosRequest()
    {
        $users = new \Maxer\API\Request\LastPhotosRequest();
        $users->execute();
        $response = $users->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}
