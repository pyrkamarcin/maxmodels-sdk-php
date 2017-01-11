<?php

/**
 * Class JarTest
 */
class JarTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetInstance()
    {
        $jar = \Maxer\API\Framework\Jar::getInstance()->getJar();

        $this->assertEquals('http://maxmodels.pl', $jar->getConfig('base_uri'));
    }
}
