<?php

namespace App\Core;
use Pimple\Container;

class Application
{
	private $container;
	private $router;
	private $cfg;

	public function getClientIp() {
    	$ipaddress = '';
    	if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	public function __construct(Container $container) {
		$this->container=$container;
		$this->router=$this->container['router'];
		$this->cfg=$this->container['cfg'];
	}

	public function run(){
		$this->router->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

		$controller='App\Controllers\\'.ucfirst($this->router->getController()).'Controller';
		$action=$this->router->getAction();
		$action_params=$this->router->getActionParams();
		$this->container['logger']->debug($this->getClientIp()." {$this->router->getController()} {$action} ".implode(' | ', $action_params) );
		try {

			if (method_exists($controller, $action) ) {

				call_user_func_array([new $controller($this->container),$action],$action_params);
			} else {	
				throw new \Exception(" unknow method {$action} in class {$controller} ");
			}

		} catch (\Exception $e) {
				
			if ($this->cfg->debug_mode>=1) {
				throw $e;
			} else {
				$this->router->ErrorPage404();
			}
		}
	}

}