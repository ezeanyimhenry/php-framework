<?php
namespace Framework\Exceptions;

class DatabaseException extends FrameworkException
{
    public function __construct($message = 'Database error', $code = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
