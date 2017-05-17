<?php
namespace App\Core\DM;
use App\Core\DM\DataMapper;
use App\Core\Exceptions\No_Data_Found;
use App\Core\Exceptions\Unknown_Property;

abstract class Model 
{

	protected $container;
	protected $mapper;

	public function setContainer($container) {
        $this->container=$container;
    }

    public function setMapper(DataMapper $mapper) {
        $this->mapper=$mapper;
    }

    abstract public function row();

 	public function __call($name, $arguments) {
 		if ( strtolower(substr($name,0,5))=='getby' ) {
 			$property = strtolower(substr($name,5));
 			$argument=$arguments[0];
 			$this->getByProperty($property,$argument); 
 		}
    }

    public function getWithId($book_id){
    	echo $book_id;
    	$result = $this->getByProperty('id',$book_id);
    	return $result[0];
    }

    public function getByProperty($name,$argument){
    	$mapper=$this->mapper;
 		if (property_exists($this,$name)) {
			$result_arr = $mapper->select($mapper->getModel(),[$name=>$argument]);

			if (count($result_arr)>0) {
			/*	throw new No_Data_Found(get_class($this)." not exists with {$name}={$argument} "); 
			} else {*/
				$object_arr=array();
				foreach ($result_arr as $key => $record) {
					$row = array_change_key_case($record, CASE_LOWER);
					$object_arr[$key]=$mapper->build($row);
				}
				return $object_arr;
			}

 		} else {
 			throw new Unknown_Property(" not exists property {$name} in class ".$mapper->getModel());
 		}
    }

	public function all() {
		$mapper=$this->mapper;
		$result_arr = $mapper->select($mapper->getModel(),array());
		$result= array();
		if (count($result_arr)==0) {
			throw new No_Data_Found(" not exists records "); 
		}
		foreach ( $result_arr as $key => $value ) {
			$row = array_change_key_case($result_arr[$key], CASE_LOWER);
			$result[$key]= $mapper->build($row);
		}
		return $result;
	}

}