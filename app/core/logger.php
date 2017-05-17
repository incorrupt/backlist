<?php

namespace App\Core;
use Pimple\Container;

class Logger
{
	protected $container;

	public function __construct( Container $container) {
        $this->container=$container;
    }

    public function sql($sql,$param=array()){
    	$message='SQL: '.$sql.' PARAM: '.json_encode($param);
    	$file = $this->container['cfg']->sql_log;

    	if (file_exists($file)) {
  			$fh = fopen($file, 'a');
  			fwrite($fh, $message."\n");
		} else {
  			$fh = fopen($file, 'w');
  			fwrite($fh, $message."\n");
		}
		fclose($fh);
    }

    

}

