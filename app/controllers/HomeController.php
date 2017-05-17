<?php
namespace App\Controllers;
use App\Core\Controller;

class HomeController extends Controller{
	
	public function index(){
		$this->view->title='Home Index';
		$this->view->description='Home Index';
		$data=array();

		$book_mapper=$this->container['book_mapper'];

		$data['books'] = $book_mapper->create()->all();

		$this->view->render('home',$data);
	}

	public function books(){
		$data=array();

		$book_mapper=$this->container['book_mapper'];

		$data['books'] = $book_mapper->create()->all();

		$this->view->render('home',$data);
	}

		//print_r($_GET);
		
		/*
		$author_mapper=$this->container['author_mapper'];
		$genre_mapper=$this->container['genre_mapper'];
		$book_mapper=$this->container['book_mapper'];
		$book_author_mapper=$this->container['book_author_mapper'];
		$book_genre_mapper=$this->container['book_genre_mapper'];

	/*	$genre = $genre_mapper->build(['name'=>'JAVA EE']);
		$genre_mapper->save($genre);

		$author1 = $author_mapper->build(['name'=>'Mike']);
		$author_mapper->save($author1);
		$author2 = $author_mapper->build(['name'=>'Bill']);
		$author_mapper->save($author2);
 
 		$book = $book_mapper->build(['title'=>'Android. Develop']);
		$book_mapper->save($book);

		$book->addGenre($genre);
		$book->addAuthor($author1);
		$book->addAuthor($author2);

		$genre2 = $genre_mapper->create()->getByName('JAVA 2');

		print_r($genre2->row());

/*		$genre = $genre_mapper->build(['name'=>'ANDROID']);
		$genre_mapper->save($genre);

		$author1 = $author_mapper->build(['name'=>'Брайн Харди 2']);
		$author_mapper->save($author1);
		$author2 = $author_mapper->build(['name'=>'Билл Филлипс 2']);
		$author_mapper->save($author2);

		$genre = $genre_mapper->build(['name'=>'Android 1']);
		$genre_mapper->save($genre);

		$book = $book_mapper->build(['title'=>'Android. Программирование для профессионалов 1']);
		$book_mapper->save($book);

		$book_author1 = $book_author_mapper->build(['book_id'=>$book->id,'author_id'=>$author1->id]);
		$book_author_mapper->save($book_author1);
		$book_author2 = $book_author_mapper->build(['book_id'=>$book->id,'author_id'=>$author2->id]);
		$book_author_mapper->save($book_author2);

		$book_genre = $book_genre_mapper->build(['book_id'=>$book->id,'genre_id'=>$genre->id]);
		$book_genre_mapper->save($book_genre);
*/

 	  
 /*
		$book = $this->container['book_mapper']->all();
		foreach ( $books as $key => $value ) {
			print_r($value->row());
		}*/
	//} 

}
