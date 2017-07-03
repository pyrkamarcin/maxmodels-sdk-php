<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\ChainCache;
use Doctrine\Common\Cache\FilesystemCache;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\DoctrineCacheStorage;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;

$stack = HandlerStack::create();

$stack->push(new CacheMiddleware(
    new PrivateCacheStrategy(
        new DoctrineCacheStorage(
            new ChainCache([
                new ArrayCache(),
                new FilesystemCache('/tmp/'),
            ])
        )
    )
), 'cache');

$client = new Client([
    'base_uri' => 'http://maxmodels.pl',
    'allow_redirects' => true,
    'debug' => false,
    'verify' => false,
    'cookies' => true,
    'timeout' => 10.0,
    'handler' => $stack
]);

$request = $client->request('POST', 'user/t/');

dump($request->getBody()->getContents());