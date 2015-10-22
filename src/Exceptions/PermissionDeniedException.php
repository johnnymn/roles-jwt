<?php

namespace Johnnymn\Sim\Roles\Exceptions;

class PermissionDeniedException extends AccessDeniedException
{
    /**
     * Create a new permission denied exception instance.
     *
     * @param string $permission
     */
    public function __construct($permission)
    {
        parent::__construct("You don't have a required '".$permission."' permission.");
    }
}
