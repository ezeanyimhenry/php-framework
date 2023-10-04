<?php
namespace Framework\Exceptions;

class ValidationException extends FrameworkException
{
    public function __construct($message = 'Validation failed', $code = 422, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
