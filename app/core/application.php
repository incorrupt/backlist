<?php

namespace App\Core;
use Pimple\Container;

class Application
{
	private $container;
	private $router;

	public function __construct(Container $container) {
		$this->container=$container;
		$this->router=$this->container['router'];
	}

	public function run(){
		try {
			$this->router->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

			$controller='App\Controllers\\'.$this->router->getController().'controller';
			$action=$this->router->getAction();
			$action_params=$this->router->getActionParams();

			if (method_exists($controller, $action) ) {
				call_user_func_array([new $controller($this->container),$action],$action_params);
			} else {	
				$this->router->ErrorPage404();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
		}

	}

}