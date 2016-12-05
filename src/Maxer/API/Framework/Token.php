<?php

namespace Maxer\API\Framework;

/**
 * Class Token
 * @package Maxer\API\Framework
 */
class Token
{
    /**
     * @var string
     */
    private $value;

    /**
     * Token constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
