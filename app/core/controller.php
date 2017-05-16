<?php
namespace App\Core;
use Pimple\Container;

abstract class Controller {
	
	protected $container;

	public function __construct( Container $container) {
		$this->container=$container;
	}
	
	abstract public function index();

}