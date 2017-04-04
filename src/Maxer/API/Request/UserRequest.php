<?php

namespace Maxer\API\Request;

use Maxer\API\Request\Base\PageRequest;

/**
 * Class UserRequest
 * @package Maxer\API\Request
 */
class UserRequest extends PageRequest
{
    /**
     * UserRequest constructor.
     */
    public function __construct()
    {
        parent::__construct('http://www.maxmodels.pl/modelka.html?filter%5Bsort%5D=active');
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
