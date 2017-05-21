<?php

require_once __DIR__.'/../vendor/autoload.php';
 
use App\Core\DM\DataMapper;
use App\Core\Configuration;
use App\Core\Logger;
use App\Core\Application;
use App\Core\Router;
use App\Core\View;
use App\Core\Exception\IAppException;

try {

	$container = new Pimple\Container();

	$container['cfg'] =$container->factory(function ($c) {
		return new Configuration("config.ini");
	});

	$container['logger'] = $container->factory(function ($c) {
  		return new Logger($c);
	});

	$container['router'] = $container->factory(function ($c) {
  		return new Router($c);
	});

	foreach(glob(__DIR__.'/Models/*.php') as $file)  
	{  
	    $model=strtolower(basename($file, ".php"));  
	    $mappername=$model.'_mapper';
	    $container[$mappername]=$container->factory(function ($c) use ($model) {
			$mapper = new DataMapper($c,$model);
			return $mapper;
		});
	}  

	$container['view'] = function ($c) {
  		return new View($c);
	};
	
	try {
		$app = new Application($container);
		$app->run();

	} catch ( Exception $e) {
		$container['logger']->error($e->getMessage());
		throw $e;
	}

} catch (Exception $e) {

	echo $e->getMessage();
}
