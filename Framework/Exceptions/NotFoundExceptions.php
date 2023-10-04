<?php
namespace Framework\Exceptions;

class NotFoundException extends FrameworkException
{
    public function __construct($message = 'Resource not found', $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
