<?php

namespace Maxer\API\Request\Base;

use Maxer\API\Framework\Request;

/**
 * Class BaseRequest
 * @package Maxer\API\Request\Base
 */
class BaseRequest extends Request
{
    /**
     * BaseRequest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute()
    {
        return parent::execute();
    }
}
