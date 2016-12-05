<?php

namespace Maxer\MaxerBundle\Domain\Analize;

use Maxer\MaxerBundle\Maxer;
use Maxer\MaxerBundle\Query;

/**
 * Class Finder
 * @package Maxer\MaxerBundle\Domain\Analize
 */
class Finder
{
    /**
     * @var Maxer
     */
    private $maxer;

    /**
     * Finder constructor.
     * @param Maxer $maxer
     */
    public function __construct(Maxer $maxer)
    {
        $this->maxer = $maxer;
    }

    /**
     * @param $page
     * @return array
     */
    public function getContent($page)
    {
        $query = new Query($this->maxer, $page);
        $response = $query->get();

        $body = $response->getBody();

        $links = explode('<div class="photoBox profile">', $body);

        dump(count($links));

        $dataids = array();

        foreach ($links as $node) {
            $rest = substr($node, 0, 200);
            $rest = explode('" style="', $rest);
            $rest = str_replace(array('<a href="', '\'', '<!'), '', $rest[0]);
            $dataids[] = $rest;
        }


//        dump($dataids);

        $drop = array_shift($dataids);
        unset($drop);

        $dataids = array_map('unserialize', array_unique(array_map('serialize', $dataids)));

        return $dataids;
    }
}
