<?php
namespace App\Core;
use Pimple\Container;

class View {

	public $title;
	public $description;
	protected $container;

	public function __construct( Container $container) {
		$this->container=$container;
		$this->title=$container['cfg']->default_page_title;
		$this->description=$container['cfg']->default_page_description;
	}

	function render($template_view, $data = null)
	{
		$templ_path = __DIR__."/../views/{$template_view}.view.php";
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

	}
}