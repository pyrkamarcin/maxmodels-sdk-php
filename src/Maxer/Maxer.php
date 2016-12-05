<?php

namespace Maxer;

use Maxer\API\Framework\Token;
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
     * @param array $photos
     * @return array
     */
    public function vouter(array $photos)
    {
        $array = [];

        foreach ($photos as $photo) {

            $token = new Token();

            $result = new VoutePhotoRequest(
                $token->getValue(),
                $photo->getId()
            );
            dump($this);

            $array[] = $result->execute();
        }
        return $array;
    }
}
