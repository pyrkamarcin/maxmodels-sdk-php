<?php

namespace Maxer\API\Response;

use Maxer\API\Model\Photo;
use Psr\Http\Message\ResponseInterface;

/**
 * Class LastPhotosResponse
 * @package Maxer\API\Response
 */
final class LastPhotosResponse extends BaseResponse
{
    /**
     * @param ResponseInterface $response
     * @param int $limit
     * @return array
     */
    public static function parse(ResponseInterface $response, int $limit = 51)
    {
        $end = explode("data-id=\"", $response->getBody()->getContents());

        $dataids = array();

        foreach ($end as $node) {
            $rest = substr($node, 0, 7);
            $rest = str_replace(array('\'', '<!'), '', $rest);
            $dataids[] = $rest;
        }

        $dataids = array_map('unserialize', array_unique(array_map('serialize', $dataids)));
        $dataids = array_slice($dataids, 2, $limit);

        return $dataids;
    }


    /**
     * @param array $dataids
     * @return array
     */
    public static function toObjects(array $dataids)
    {
        $array = [];
        foreach ($dataids as $dataid) {
            $array[] = new Photo([
                'id' => $dataid
            ]);
        }
        return $array;
    }
}
