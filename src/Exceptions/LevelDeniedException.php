<?php

namespace Johnnymn\Sim\Roles\Exceptions;

class LevelDeniedException extends AccessDeniedException
{
    /**
     * Create a new level denied exception instance.
     *
     * @param string $level
     */
    public function __construct($level)
    {
        parent::__construct("You don't have a required '".$level."' level.");
    }
}
