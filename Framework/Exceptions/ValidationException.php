<?php
namespace Framework\Exceptions;

class ValidationException extends FrameworkException
{
    public function __construct($message = 'Validation failed', $statusCode = 422, \Throwable $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
    }
}
