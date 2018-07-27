<?php

namespace App\Models;

class ErrorModel
{
    public $statusCode;

    public $message;

    public function __construct($message, $statusCode) {
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
}
