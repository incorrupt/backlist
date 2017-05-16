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
}

