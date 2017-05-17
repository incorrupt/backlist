<?php
namespace App\Core;

class View {

	protected $container;

	public function __construct( Container $container) {
		$this->container=$container;
	}

	function render($template_view, $data = null)
	{
		$templ_path = glob(__DIR__."/views/{$template_view}.php")
 
		if (!is_file($templ_path)) {
			throw new \Exception("view not exists ");
		}

		if(is_array($data)) {
			extract($data);
		}
		ob_start();
		ob_implicit_flush(0);
		try {
			require $templ_path;
		} catch (\Exception $e) {
			ob_end_clean();
			throw $e;
		}
 
		//include 'app/views/'.$template_view;
	}
}