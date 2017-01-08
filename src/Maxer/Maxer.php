<?php

namespace Maxer;

use Maxer\API\Framework\Token;
use Maxer\API\Model\Photo;
use Maxer\API\Request\LastPhotosRequest;
use Maxer\API\Request\LoginRequest;
use Maxer\API\Request\VoutePhotoRequest;
use Maxer\API\Response\LastPhotosResponse;

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
     * @param int $limit
     * @return array
     */
    public function getLastPhotos(int $limit)
    {
        $request = new LastPhotosRequest();
        return LastPhotosResponse::toObjects(LastPhotosResponse::parse($request->execute(), $limit));
    }

    /**
     * @param Photo $photo
     * @return VoutePhotoRequest
     */
    public function vouter(Photo $photo)
    {
        return new VoutePhotoRequest(new Token(), $photo);
    }
}
