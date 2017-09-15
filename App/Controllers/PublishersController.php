<?php
namespace App\Controllers;
use App\Core\Controller;

class PublishersController extends Controller{
	
	public function index(){
		$this->all();
	}

	public function show($id){
		$data=array();
		$mapper=$this->container['publisher_mapper'];
		$publisher = $mapper->create()->getWithId($id);
		$data['publisher']=$publisher;
		$data['books']=$publisher->getBooks();
		$data['active_nav'] = 'publisher';
		$this->view->title.=' | '.$publisher->name;
		$this->view->render('publisher_item',$data);
	}

	public function all() {
		$this->view->title.=' | publisher list';
		$data=array();
		$mapper=$this->container['publisher_mapper'];
		$data['active_nav'] = 'publisher';
		$data['publishers'] = $mapper->create()->all();
		$this->view->render('publishers_list',$data);
	}

}
