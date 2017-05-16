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

}

