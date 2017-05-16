<?php
namespace App\Core;
use Exception;

class Configuration {


	public function __get($name) 
    { 
    	$cfg_file = "config.ini";
    	if (!file_exists($cfg_file)) {
    		throw new Exception(" config file not exists ");
    	}
    	$conf= parse_ini_file("config.ini", true);	
    	if (!array_key_exists($name,$conf) /*or empty($conf[$name])*/ ) {
    		throw new Exception(" error config property '{$name}' ");	
    	}
        return $conf[$name]; 
    } 
	

}