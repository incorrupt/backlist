<?php
namespace App\Core;
use Exception;

class Configuration {

    private $config_file;

    public function __construct($config_file) {
        if (!file_exists($config_file)) {
            throw new Exception(" config file not exists ");
        }
        $this->config_file=$config_file;
    }

	public function __get($name) 
    { 
    	$cfg_file = $this->config_file;
    	$conf= parse_ini_file($cfg_file, true);	
    	if (!array_key_exists($name,$conf) /*or empty($conf[$name])*/ ) {
    		throw new Exception(" error config property '{$name}' ");	
    	}
        return $conf[$name]; 
    } 
	

}