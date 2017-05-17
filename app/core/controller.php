<?php
namespace App\Core;
use Pimple\Container;

abstract class Controller {
	
	protected $container;
	protected $view;

	public function __construct( Container $container) {
		$this->container=$container;
		$this->view=$container['view'];
	}
	
	abstract public function index();

}