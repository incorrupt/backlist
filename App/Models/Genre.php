<?php
namespace App\Models;
use App\Core\DM\Model;

class Genre extends Model {

	public $id;
    public $name;

    public function row(){
    	$row['id']=$this->id;
   		$row['name']=$this->name;
    	return $row;
    } 

    public function getBooks() {
        $book_mapper=$this->container['book_mapper'];
        $book_genre_mapper=$this->container['book_genre_mapper'];
        $books_genre = $book_genre_mapper->create()->getByGenre_id($this->id);
        $books =array();
        if (count($books_genre)>0){      
            foreach ($books_genre as $key => $item) {
                $books[$key] = $book_mapper->create()->getWithId($item->book_id);
            }
        }   
        return $books;
    }

}

