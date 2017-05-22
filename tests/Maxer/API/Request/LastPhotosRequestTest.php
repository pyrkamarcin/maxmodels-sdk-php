<?php

/**
 * Class LastPhotosRequestTest
 */
class LastPhotosRequestTest extends \PHPUnit\Framework\TestCase
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
