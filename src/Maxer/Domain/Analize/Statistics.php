<?php

namespace Maxer\MaxerBundle\Domain\Analize;

use Maxer\MaxerBundle\Maxer;
use Maxer\MaxerBundle\Query;

/**
 * Class Statistics
 * @package Maxer\MaxerBundle\Domain\Analize
 */
class Statistics
{
    /**
     * @var Maxer
     */
    private $maxer;

    /**
     * Statistics constructor.
     * @param Maxer $maxer
     */
    public function __construct(Maxer $maxer)
    {
        $this->maxer = $maxer;
    }

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        $content = $this->getContent(
            'http://www.maxmodels.pl/user/profile',
            '<a href="/user/profile">Zdjęcia  <span id="userphotocounter">'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }

    /**
     * @param string $link
     * @param string $marker
     * @return array
     */
    private function getContent(string $link, string $marker)
    {
        $query = new Query($this->maxer, $link);
        $body = $query->get()->getBody();

        return explode($marker, $body);
    }

    /**
     * @param array $content
     * @return array
     */
    private function filter(array $content)
    {
        $dataids = array();

        foreach ($content as $node) {
            $rest = substr($node, 0, 20);
            $rest = preg_replace('/\D/', '', $rest);
            $rest = str_replace(array('\'', '<!', "\"", '<', '>', ')', '/', '('), '', $rest);

            $dataids[] = $rest;
        }

        return $dataids;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        $content = $this->getContent(
            'http://www.maxmodels.pl/user/profile',
            '<li><a href="/user/profilecomments">Komentarze <span>'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }

    /**
     * @return mixed
     */
    public function getReferences()
    {
        $content = $this->getContent(
            'http://www.maxmodels.pl/user/profile',
            '<li><a href="/user/profilereferences">Referencje <span>'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }

    /**
     * @return mixed
     */
    public function getObserved()
    {
        $content = $this->getContent(
            'http://www.maxmodels.pl/user/profile',
            '<li><a href="/user/profileobserved">Obserwuję <span>'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }

    /**
     * @return mixed
     */
    public function getObserving()
    {
        $content = $this->getContent(
            'http://www.maxmodels.pl/user/profile',
            '<li><a href="/user/profileobserving">Obserwujący <span>'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }

    /**
     * @return mixed
     */
    public function getViews()
    {
        $content = $this->getContent(
            'http://www.maxmodels.pl/user/profile',
            '<span class="title">Odwiedzin</span>
					<span class="value">'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }


    /**
     * @param $link
     * @return mixed
     */
    public function getViewsFromProfile($link)
    {
        $content = $this->getContent(
            $link,
            '<span class="title">Odwiedzin</span>
					<span class="value">'
        );

        $dataids = $this->filter($content);
        return $dataids[1];
    }
}
