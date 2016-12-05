<?php

namespace Maxer\API\Response;

use Psr\Http\Message\ResponseInterface;

final class LastPhotosResponse extends BaseResponse
{
    public static function parse(ResponseInterface $response)
    {
        $end = explode("data-id=\"", $response->getBody()->getContents());

        $dataids = array();

        foreach ($end as $node) {
            $rest = substr($node, 0, 7);
            $rest = str_replace(array('\'', '<!'), '', $rest);
            $dataids[] = $rest;
        }

        $dataids = array_map('unserialize', array_unique(array_map('serialize', $dataids)));
        $dataids = array_slice($dataids, 2, 51);

        return $dataids;
    }
}
