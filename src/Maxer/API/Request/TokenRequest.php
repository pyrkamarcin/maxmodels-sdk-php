<?php

namespace Maxer\API\Request;

/**
 * Class TokenRequest
 * @package Maxer\API\Request
 */
final class TokenRequest extends BaseRequest
{
    /**
     * TokenRequest constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setPath('http://www.maxmodels.pl/user/t');
        $this->setMethod('get');
        $this->setBody(array());
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute()
    {
        return parent::execute();
    }
}
