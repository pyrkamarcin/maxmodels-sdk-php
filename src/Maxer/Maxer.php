<?php

namespace Maxer;

use Maxer\API\Framework\Token;
use Maxer\API\Model\Photo;
use Maxer\API\Model\User;
use Maxer\API\Request\Base\PageRequest;
use Maxer\API\Request\LastPhotosRequest;
use Maxer\API\Request\LoginRequest;
use Maxer\API\Request\ObservedPhotosRequest;
use Maxer\API\Request\VoutePhotoRequest;
use Maxer\API\Response\PhotosResponse;

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
        return PhotosResponse::toObjects(PhotosResponse::parse($request->execute(), $limit));
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getObservedtPhotos(int $limit)
    {
        $request = new ObservedPhotosRequest();
        return PhotosResponse::toObjects(PhotosResponse::parse($request->execute(), $limit));
    }

    public function getUserPhotos(User $user, int $limit)
    {
        $link = 'http://www.maxmodels.pl/modelka-' . $user->getName() . '.html';
        $request = new PageRequest($link, 12);
        return PhotosResponse::toObjects(PhotosResponse::parse($request->execute(), $limit));
    }

    /**
     * @param Photo $photo
     * @param int $rate
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function setPhotoVoute(Photo $photo, int $rate)
    {
        $request = new VoutePhotoRequest(new Token(), $photo, $rate);
        return $request->execute();
    }

}
