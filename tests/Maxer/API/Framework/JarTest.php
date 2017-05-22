<?php

/**
 * Class JarTest
 */
class JarTest extends \PHPUnit\Framework\TestCase
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
