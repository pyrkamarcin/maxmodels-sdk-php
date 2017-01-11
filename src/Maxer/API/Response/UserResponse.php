<?php

namespace Maxer\API\Response;

use Maxer\API\Model\User;
use Psr\Http\Message\ResponseInterface;

class UserResponse extends BaseResponse implements Response
{
    public static function parse(ResponseInterface $response, int $limit = 30)
    {
        $end = explode("data-usr_id=\"", $response->getBody()->getContents());

        $dataids = array();

        foreach ($end as $node) {
            $rest = substr($node, 0, 7);
            $rest = str_replace(array('\'', '<!'), '', $rest);
            $dataids[] = $rest;
        }

        $dataids = array_map('unserialize', array_unique(array_map('serialize', $dataids)));
        $dataids = array_slice($dataids, 1, $limit);

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
            $array[] = new User([
                'id' => $dataid
            ]);
        }
        return $array;
    }
}
