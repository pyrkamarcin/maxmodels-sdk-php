<?php

namespace Maxer\API\Request;

use Maxer\API\Framework\Request;

class BaseRequest extends Request
{
    public function __construct()
    {
        parent::__construct();
    }

    public function execute()
    {
        return parent::execute();
    }
}
