<?php
namespace Framework\Middleware;

use Framework\Exceptions\FrameworkException;
use Framework\Exceptions\DatabaseException;
use Framework\Exceptions\NotFoundException;

class ExceptionHandlerMiddleware {
    public static function handleException($exception) {
        if ($exception instanceof FrameworkException) {
            http_response_code($exception->getStatusCode());
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'status code' => $exception->getStatusCode(), 'message' => $exception->getMessage()]);
        } elseif ($exception instanceof DatabaseException) {
            // Handle database-related exceptions
        } elseif ($exception instanceof NotFoundException) {
            // Handle not found exceptions
        } else {
            // Handle other exceptions
        }
    }
}
