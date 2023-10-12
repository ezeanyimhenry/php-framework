<?php
namespace Framework\Exceptions;

class DatabaseException extends FrameworkException
{
    public function __construct($message = 'Database error', $statusCode = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
    }
}
