<?php
namespace App\Models;
use App\Core\DM\Model;

class Publisher extends Model {

	public $id;
    public $name;
    public $city;

    public function row(){
    	$row['id']=$this->id;
   		$row['name']=$this->name;
    	$row['city']=$this->city;
    	return $row;
    }

    public function getBooks() {
        $book_mapper=$this->container['book_mapper'];
        $books_p = $book_mapper->create()->getByPublisher_id($this->id);
        $books =array();
        if (count($books_p)>0){      
            foreach ($books_p as $key => $item) {
                $books[$key] = $book_mapper->create()->getWithId($item->id);
            }
        }   
        return $books;
    }

}

