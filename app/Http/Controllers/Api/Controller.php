<?php

namespace App\Http\Controllers\Api;

use App\Exception\ExceptionJsonResponse;
use Exception;

class Controller 
{
    protected function errorHandler(string $message, Exception $error, int $statusCode) {
        throw new ExceptionJsonResponse(
            message: $messagem,
            previous: $error,
            code: $statusCode,
        );
    }
}
