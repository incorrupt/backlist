<?php
namespace App\Models;
use App\Core\DM\Model;

class Book_Genre extends Model {

	public $id;
    public $book_id;
    public $genre_id;
     
    public function row(){
    	$row['id']=$this->id;
   		$row['book_id']=$this->book_id;
    	$row['genre_id']=$this->genre_id;
    	return $row;
    }
}

