<?php

namespace Maxer\API\Request;

use Maxer\API\Model\Photo;

/**
 * Class VoutePhotoRequest
 * @package Maxer\API\Request
 */
class VoutePhotoRequest extends PageRequest
{
    /**
     * VoutePhotoRequest constructor.
     * @param string $token
     * @param Photo $photo
     */
    public function __construct(string $token, Photo $photo)
    {
        parent::__construct('http://www.maxmodels.pl/photo/vote/t/' . $token);

        $this->setMethod('post');
        $this->setBody([
            'form_params' => [
                'rate' => 6,
                'id' => $photo->getId(),
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
