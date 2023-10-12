<?php

namespace Framework\Exceptions;

use Exception;

class FrameworkException extends Exception
{
    // Define constants for common HTTP status codes
    const HTTP_BAD_REQUEST = 400;
    const HTTP_NOT_FOUND = 404;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    // Default status code
    protected $statusCode = self::HTTP_INTERNAL_SERVER_ERROR;

    // Constructor with optional status code and message
    public function __construct($message = null, $statusCode = null, Exception $previous = null)
    {
        if ($statusCode !== null) {
            $this->statusCode = $statusCode;
        }

        parent::__construct($message, $statusCode, $previous);
    }

    // Get the status code
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
