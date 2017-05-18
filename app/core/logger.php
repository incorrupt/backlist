<?php

namespace App\Core;
use Pimple\Container;

class Logger {

	protected $container;

	public function __construct( Container $container) {
		$this->container=$container;
	}

	private function write($file,$string){

		$f = (file_exists($file)) ? fopen($file, 'a') : fopen($file, 'w');
		fwrite($f, $string."\n");	
		fclose($f);
	}

	public function error($mess) {

		$message="ERROR: {$mess}";
		$file = $this->container['cfg']->error_log;
		$this->write($file,$message);	
	}

	public function debug($mess) {

		$message="DEBUG: {$mess}";
		$file = $this->container['cfg']->debug_log;
		$this->write($file,$message);	
	}

	public function sql($sql,$param=array() ) {
		$param_arr=$param;
		array_walk($param_arr, function(&$item,$key) {
			$item ="{$key} = {$item}";
		}); 
		$message="SQL: {$sql} PARAM: [".implode(',',$param_arr)."]";
		$file = $this->container['cfg']->sql_log;
		$this->write($file,$message);
	}

    

}

