<?php
namespace App\Core\Exceptions;
use App\Core\IAppException;

class No_Data_Found extends Exception implements IAppException {

    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

} 