<?php

namespace Maxer\API\Request;

/**
 * Class VouteRequest
 * @package Maxer\API\Request
 */
class VouteRequest extends PageRequest
{

    public function __construct(string $token, string $item)
    {
        parent::__construct('http://www.maxmodels.pl/photo/vote/t/' . $token);

        $this->setMethod('post');
        $this->setBody([
            'form_params' => [
                'rate' => 6,
                'id' => $item,
            ]
        ]);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute()
    {
        return parent::execute();
    }
}
