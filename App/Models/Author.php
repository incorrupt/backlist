<?php
namespace App\Models;
use App\Core\DM\Model;

class Author extends Model {

	public $id;
    public $name;

    public function row(){
    	$row['id']=$this->id;
   		$row['name']=$this->name;
    	return $row;
    }

    public function getBooks() {
        $book_mapper=$this->container['book_mapper'];
        $book_author_mapper=$this->container['book_author_mapper'];
        $books_author = $book_author_mapper->create()->getByAuthor_id($this->id);
        $books =array();
        if (count($books_author)>0){      
            foreach ($books_author as $key => $item) {
                $books[$key] = $book_mapper->create()->getWithId($item->book_id);
            }
        }   
        return $books;
    }

}

