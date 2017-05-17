<?php

namespace App\Core;
use Pimple\Container;

class Application
{
	private $container;
	private $router;
	private $cfg;

	public function __construct(Container $container) {
		$this->container=$container;
		$this->router=$this->container['router'];
		$this->cfg=$this->container['cfg'];
	}

	public function run(){
		try {
			$this->router->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

			$controller='App\Controllers\\'.$this->router->getController().'controller';
			$action=$this->router->getAction();
			$action_params=$this->router->getActionParams();

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

		} catch (\Exception $e) {
			echo $e->getMessage();
			exit;
		}

	}

}