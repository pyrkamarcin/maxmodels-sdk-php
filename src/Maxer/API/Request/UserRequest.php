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
        parent::__construct('http://www.maxmodels.pl/modelka.html');
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute()
    {
        return parent::execute();
    }
}
