<?php
namespace App\Controllers;
use App\Core\Controller;

class AuthorsController extends Controller{
	
	public function index(){
		$this->all();
	}

	public function show($id){
		$data=array();
		$author_mapper=$this->container['author_mapper'];
		$author = $author_mapper->create()->getWithId($id);
		$data['author']=$author;
		$data['books']=$author->getBooks();
		$data['active_nav'] = 'authors';
		$this->view->title.=' | '.$author->name;
		$this->view->render('author_item',$data);
	}

	public function all() {
		$this->view->title.=' | Authors list';
		$data=array();
		$mapper=$this->container['author_mapper'];
		$data['active_nav'] = 'authors';
		$data['authors'] = $mapper->create()->all();
		$this->view->render('authors_list',$data);
	}
}
