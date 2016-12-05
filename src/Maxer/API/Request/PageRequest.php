<?php

namespace Maxer\API\Request;

use Maxer\API\Framework\Request;

/**
 * Class PageRequest
 * @package Maxer\API\Request
 */
class PageRequest extends Request
{
    /**
     * PageRequest constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        parent::__construct();

        $this->setPath($path);
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
