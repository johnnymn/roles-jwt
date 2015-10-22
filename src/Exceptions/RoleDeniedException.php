<?php

namespace Johnnymn\Sim\Roles\Exceptions;

class RoleDeniedException extends AccessDeniedException
{
    /**
     * Create a new role denied exception instance.
     *
     * @param string $role
     */
    public function __construct($role)
    {
        parent::__construct("You don't have a required '".$role."' role.");
    }
}
