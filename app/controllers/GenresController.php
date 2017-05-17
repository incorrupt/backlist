<?php
namespace App\Controllers;
use App\Core\Controller;

class GenresController extends Controller{
	
	public function index(){
		$this->all();
	}

	public function show($id){
		$data=array();
		$genre_mapper=$this->container['genre_mapper'];
		$genre = $genre_mapper->create()->getWithId($id);
		$data['genre']=$genre;
		$data['books']=$genre->getBooks();
		$this->view->title.=' | '.$genre->name;
		$this->view->render('genre_item',$data);
	}

	public function all(){}

}
