<?php

namespace Maxer\API\Framework;

use GuzzleHttp\Client;

/**
 * Class Jar
 * @package Maxer\API\Framework
 */
final class Jar
{
    /**
     * @var bool
     */
    private static $oInstance = false;

    /**
     * @var Client
     */
    private $jar;

    /**
     * Jar constructor.
     */
    protected function __construct()
    {
        $this->jar = new Client([
            'base_uri' => 'http://maxmodels.pl',
            'allow_redirects' => true,
            'debug' => false,
            'verify' => false,
            'cookies' => true
        ]);
    }

    /**
     * @return bool|Jar
     */
    public static function getInstance()
    {
        if (self::$oInstance === false) {
            self::$oInstance = new Jar();
        }
        return self::$oInstance;
    }

    /**
     * @return Client
     */
    public function getJar(): Client
    {
        return $this->jar;
    }
}
