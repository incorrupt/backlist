<?php
namespace App\Models;
use App\Core\DM\Model;
use App\Core\DM\Exceptions\No_Data_Found;

class Book extends Model {

	public $id;
    public $title;
    public $isbn;
    public $year;
    public $pages;
    public $description;
    public $publisher_id;
    public $looks;

    public function row(){
    	$row['id']=$this->id;
   		$row['title']=$this->title;
    	$row['isbn']=$this->isbn;
    	$row['year']=$this->year;
        $row['pages']=$this->pages;
    	$row['description']=$this->description;
    	$row['publisher_id']=$this->publisher_id;
        $row['looks']=$this->looks;
    	return $row;
    }

    public function getPublisher() {
        $publisher_mapper=$this->container['publisher_mapper'];
        $publisher = $publisher_mapper->create()->getWithId($this->publisher_id);
        return $publisher;   
    }

    public function getAuthors() {
        $author_mapper=$this->container['author_mapper'];
        $book_author_mapper=$this->container['book_author_mapper'];
        $book_authors = $book_author_mapper->create()->getByBook_id($this->id);
        $authors =array();
        if (count($book_authors)>0){      
            foreach ($book_authors as $key => $item) {
                $authors[$key] = $author_mapper->create()->getWithId($item->author_id);
            } 
        }
        return $authors;   
    }

    public function getGenres() {
        $genre_mapper=$this->container['genre_mapper'];
        $book_genre_mapper=$this->container['book_genre_mapper'];
        $book_genres = $book_genre_mapper->create()->getByBook_id($this->id);
        $genres =array();
        if (count($book_genres)>0){
           
            foreach ($book_genres as $key => $item) {
                $genres[$key] = $genre_mapper->create()->getWithId($item->genre_id);
            }  
        }
        return $genres;   
    }

    public function addGenre(Genre &$genre) {
        $genre_mapper=$this->container['genre_mapper'];
        $book_genre_mapper=$this->container['book_genre_mapper'];

        if (!$genre->id) {
            try {
                $genre = $genre_mapper->create()->getByName($genre->name); 
            }  catch (No_Data_Found $e) {
                $genre = $genre_mapper->build($genre->row());  
                $genre_mapper->save($genre);
            }
        }

        if (!$this->id) {
            $this->mapper->save($this);
        }
        $book_genre = $book_genre_mapper->build(['book_id'=>$this->id,'genre_id'=>$genre->id]);
        $book_genre_mapper->save($book_genre);
    }

    public function addAuthor(Author &$author) {
        $author_mapper=$this->container['author_mapper'];
        $book_author_mapper=$this->container['book_author_mapper'];

        if (!$author->id) {
            try {
                $author = $author_mapper->create()->getByName($author->name); 
            }  catch (No_Data_Found $e) {
                $author = $author_mapper->build($author->row());  
                $author_mapper->save($author);
            }
        }

        if (!$this->id) {
            $this->mapper->save($this);
        }
        $book_author = $book_author_mapper->build(['book_id'=>$this->id,'author_id'=>$author->id]);
        $book_author_mapper->save($book_author);
    }

    public function search($vals=array()){
        $fields=['title','isbn','description'];
        $book_search= $this->mapper->search($fields,$vals);
        $books =array();
        if (count($book_search)>0){
            foreach ($book_search as $key => $item) {
                $books[$key] = $this->mapper->build($item);
            }  
        }
        return $books;   
    }

}

