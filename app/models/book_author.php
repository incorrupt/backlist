<?php
namespace App\Models;
use App\Core\DM\Model;

class Book_Author extends Model {

	public $id;
    public $book_id;
    public $author_id;

    public function row(){
    	$row['id']=$this->id;
   		$row['book_id']=$this->book_id;
    	$row['author_id']=$this->author_id;
    	return $row;
    }
}

