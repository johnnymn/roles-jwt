<?php

namespace Johnnymn\Sim\Roles\Exceptions;

use Exception;

class AccessDeniedException extends Exception
{
    /**
     * Constructor.
     *
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param int        $code     The internal exception code
     */
    public function __construct($message = 'Unauthorized', 
        \Exception $previous = null, $code = 401)
    {
        parent::__construct($message, $code, $previous);
    }
}
