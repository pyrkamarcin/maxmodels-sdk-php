<?php

namespace Maxer\MaxerBundle\Domain\Analize;

use Maxer\MaxerBundle\Maxer;
use Maxer\MaxerBundle\Query;

/**
 * Class Observed
 * @package Maxer\MaxerBundle\Domain\Analize
 */
class Observed
{

    /**
     * @var Maxer
     */
    private $maxer;

    /**
     * Models constructor.
     * @param Maxer $maxer
     */
    public function __construct(Maxer $maxer)
    {
        $this->maxer = $maxer;
    }

    /**
     * @return array
     */
    public function getObserved()
    {
        $query = new Query($this->maxer, "http://www.maxmodels.pl/user/profileobserved/order/najaktywniejsi");

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
        $dataids = array_reverse($dataids);

        return $dataids;
    }

    /**
     * @param $dataids
     */
    public function cleanObserved($dataids)
    {
        echo("Czyszczenie obserwowanych profili: \n");

        foreach ($dataids as $item) {

            $token = $this->maxer->getTValue();

            echo("\tUsunięte: " . $item);

            $this->maxer->client->post("http://www.maxmodels.pl/user/observe", [
                'form_params' => [
                    'act' => "REMOVE",
                    'id' => $item,
                    't' => $token
                ],
                'cookies' => $this->maxer->jar
            ]);

            echo("\t ( ok )\n");

            sleep(0);
        }
    }
}
