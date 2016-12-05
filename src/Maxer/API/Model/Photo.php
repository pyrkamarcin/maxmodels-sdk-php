<?php

namespace Maxer\API\Model;

/**
 * Class Photo
 * @package Maxer\API\Model
 */
class Photo extends Model
{
    /**
     * @var
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
