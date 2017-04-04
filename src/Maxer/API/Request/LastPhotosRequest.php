<?php

namespace Maxer\API\Request;

use Maxer\API\Request\Base\PageRequest;

/**
 * Class LastPhotosRequest
 * @package Maxer\API\Request
 */
class LastPhotosRequest extends PageRequest
{
    /**
     * LastPhotosRequest constructor.
     */
    public function __construct()
    {
        parent::__construct('http://www.maxmodels.pl/wszystkie-zdjecia,0.html');
        $this->setMethod('get');
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute()
    {
        return parent::execute();
    }
}
