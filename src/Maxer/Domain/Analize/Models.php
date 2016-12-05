<?php

namespace Maxer\MaxerBundle\Domain\Analize;

use Maxer\MaxerBundle\Maxer;
use Maxer\MaxerBundle\Query;

/**
 * Class Models
 * @package Maxer\MaxerBundle\Domain\Analize
 */
class Models
{

    /**
     * @var Maxer
     */
    private $maxer;

    /**
     * @var
     */
    private $page;

    /**
     * Models constructor.
     * @param Maxer $maxer
     * @param int $page
     */
    public function __construct(Maxer $maxer, $page = 1)
    {
        $this->maxer = $maxer;
        $this->page = $page;
    }

    /**
     * @return array
     */
    public function getModels()
    {
        $query = new Query($this->maxer, "http://www.maxmodels.pl/modelka," . $this->page . ".html?filter%5Bsort%5D=active");

        $body = $query->get()->getBody();

        $content = explode("data-usr_id=\"", $body);

        $dataids = array();

        foreach ($content as $node) {
            $rest = substr($node, 0, 6);
            $rest = str_replace(array('\'', '<!', "\"", "<", ">"), '', $rest);
            $dataids[] = $rest;
        }

        $dataids = array_map('unserialize', array_unique(array_map('serialize', $dataids)));
        $dataids = array_slice($dataids, 1, 30);

        return $dataids;
    }
}
