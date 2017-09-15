<?php
namespace App\Core;
use Pimple\Container;

class Router
{
	public $method;
	public $controller;
	public $action;
	public $action_params;
	protected $container;

	public function __construct( Container $container) {
		$this->container=$container;
	}
	
	public function getController(){
		return $this->controller;
	}

	public function getAction(){
		return $this->action;
	}

	public function getActionParams(){
		return $this->action_params;
	}

	public function dispatch($method,$url) {

		$this->method = $method;

		if ($position=strpos($url,'?')) {
			$url=substr($url,0,$position);
		}

		$routes = explode('/',$url);

		if ( !empty($routes[1]) ) {	
			$this->controller = $routes[1];
		} else {
			$this->controller = $this->container['cfg']->default_controller;
		}

		if ( !empty($routes[2]) ) {
			$this->action = $routes[2];
		} else {
			$this->action = 'index';
		}
		
		if ( !empty($routes[3]) ) {
			$this->action_params = array_slice($routes,3) ;
		} else {
			$this->action_params = array();
		}

	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}