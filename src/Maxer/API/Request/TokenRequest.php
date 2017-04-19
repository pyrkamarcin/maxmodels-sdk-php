<?php

namespace Maxer\API\Request;

use Maxer\API\Request\Base\BaseRequest;

/**
 * Class TokenRequest
 * @package Maxer\API\Request
 */
final class TokenRequest extends BaseRequest
{
    /**
     * TokenRequest constructor.
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct();

        $this->setPath('http://www.maxmodels.pl/user/t');
        $this->setMethod('get');
        $this->setBody(array());
    }
}
