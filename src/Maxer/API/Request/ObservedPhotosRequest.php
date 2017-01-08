<?php

namespace Maxer\API\Request;

/**
 * Class ObservedPhotosRequest
 * @package Maxer\API\Request
 */
class ObservedPhotosRequest extends PageRequest
{
    /**
     * ObservedPhotosRequest constructor.
     */
    public function __construct()
    {
        parent::__construct('http://www.maxmodels.pl/obserwowane,0.html');
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute()
    {
        return parent::execute();
    }
}
