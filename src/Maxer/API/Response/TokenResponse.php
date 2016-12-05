<?php

namespace Maxer\API\Response;

use Psr\Http\Message\ResponseInterface;

final class TokenResponse extends BaseResponse
{
    public static function parse(ResponseInterface $response)
    {
        $json = json_decode($response->getBody()->getContents(), true);
        return (string)$json['t'];
    }
}
