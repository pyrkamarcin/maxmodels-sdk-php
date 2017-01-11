<?php

/**
 * Class ObservedPhotosRequestTest
 */
class ObservedPhotosRequestTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testObservedPhotosRequest()
    {
        $users = new \Maxer\API\Request\ObservedPhotosRequest();
        $users->execute();
        $response = $users->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}
