<?php
namespace App\Core\DM\Exceptions;
use PDO;
use Exception;

class No_Data_Found extends Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {
    	
        parent::__construct($message, $code, $previous);

    }


}