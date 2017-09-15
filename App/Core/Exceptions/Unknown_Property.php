<?php
namespace App\Core\Exceptions;
use Exception;

class Unknown_Property extends Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

}