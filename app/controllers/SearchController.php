<?php
namespace App\Controllers;
use App\Core\Controller;

class SearchController extends Controller{
	
	public function index(){
		$data=array();
		$data['active_nav'] = 'search';
		$this->view->title.=' | Поиск книг ';
		$this->view->render('search_result',$data);
	}

}
