<?php

namespace Maxer;

use Maxer\API\Request\LastPhotosRequest;
use Maxer\API\Request\LoginRequest;
use Maxer\API\Request\TokenRequest;
use Maxer\API\Request\VouteRequest;
use Maxer\API\Response\LastPhotosResponse;
use Maxer\API\Response\TokenResponse;

/**
 * Class Maxer
 * @package Maxer
 */
class Maxer
{
    /**
     * Maxer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $username
     * @param string $password
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function login(string $username, string $password)
    {
        $request = new LoginRequest($username, $password);
        return $request->execute();
    }

    /**
     * @return array
     */
    public function getLastPhotos()
    {
        $request = new LastPhotosRequest();
        return LastPhotosResponse::toObjects(LastPhotosResponse::parse($request->execute()));
    }

    /**
     * @param array $photos
     */
    public function vouter(array $photos)
    {
        foreach ($photos as $photo) {
            $result = new VouteRequest($this->getToken(), $photo->getId());
            $result->execute();
        }
    }

    /**
     * @return string
     */
    public function getToken()
    {
        $request = new TokenRequest();
        return TokenResponse::parse($request->execute());
    }
}
