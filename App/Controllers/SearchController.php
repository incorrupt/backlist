<?php
namespace App\Controllers;
use App\Core\Controller;

class SearchController extends Controller{
	
	public function index(){
		$books=array();
		if (isset($_POST['search_str'])) {
			$search_str=strval(htmlspecialchars($_POST['search_str']));
			$book_mapper=$this->container['book_mapper'];	
			$books=$book_mapper->create()->search([$search_str]);
		}
		$data['search_str'] = $search_str;
		$data['books'] = $books;
		$data['active_nav'] = 'search';
		$this->view->title.=' | Поиск книг ';
		$this->view->render('search_result',$data);	
	}

}
