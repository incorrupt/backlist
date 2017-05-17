<?php


require_once __DIR__.'/../vendor/autoload.php';
 
use App\Core\DM\DataMapper;
use App\Core\Configuration;
use App\Core\Application;
use App\Core\Router;
use App\Core\View;

try {

	$container = new Pimple\Container();

	$container['cfg'] =$container->factory(function ($c) {
		return new Configuration;
	});

	foreach(glob(__DIR__.'/models/*.php') as $file)  
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

	$container['router'] = $container->factory(function ($c) {
  		return new Router($c);
	});

	$app = new Application($container);

	$app->run();

} catch (Exception $e) {

	echo $e->getMessage();
}
