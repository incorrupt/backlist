<?php
namespace App\Core\DM;
use App\Core\Exceptions\No_Data_Found;
use App\Core\Exceptions\Unknown_Property;
use PDO;
use Exception;

class DataMapper {

	protected $connect;
	protected $model;
	protected $container;

	public function __construct($container,$model) {
		$this->container=$container;
		$cfg=$container['cfg'];
		$this->setModel($model);
		$db_option=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
        $connect = new PDO($cfg->db_dns,$cfg->db_user,$cfg->db_pass,$db_option);
		$this->connect=$connect;
	}

	public function getModel(){
		return $this->model;
	}

	private function setModel($class) {
		if (is_subclass_of('App\Models\\'.$class, 'App\Core\DM\Model')) {
			$this->model=$class;	
		} else {
			throw new Exception("{$class} is wrong class of Model");
		}		 
	} 

	private function delete($table,$where) { 
		$arr_params = array();
		$arr_where = array();
 		foreach ( $where as $key => $value ) {
	    	$param_name = ':where_'.$key;
	    	$arr_where[] = "{$key} = {$param_name}";
	    	$arr_params[$param_name]=$value;
	    }
	    if (count($arr_where)==0) {
	    	throw new Exception(" wrong 'where' expression in update ");
	    }
	    $str_where = implode(" AND ",$arr_where);
    	$sql = "DELETE from {$table} WHERE {$str_where}";
    	$stmt = $this->connect->prepare($sql);
    	$stmt->execute($arr_params);
	}

	private function insert($table,$row) {
		if (isset($row['id'])) {
			unset($row['id']);
		}
		$col_names = implode(",",array_keys($row) );
    	$param_names = ':'.implode(",:",array_keys($row));
    	$sql = "INSERT INTO {$table}({$col_names}) VALUES({$param_names});";
    	$stmt = $this->connect->prepare("INSERT INTO {$table}({$col_names}) VALUES({$param_names})");
    	$stmt->execute($row);
    	return $this->connect->lastInsertId(); 
	}

	public function select($table,$where=array(),$order=array()) {
		
		$str_order='';
		$str_where='';
		$arr_params=array();

		if (count($where)>=1) {
			$arr_where = array();
		    foreach ( $where as $key => $value ) {
		    	$param_name = ':where_'.$key;
		    	$arr_where[] = "{$key} = {$param_name}";
		    	$arr_params[$param_name]=$value;
		    }
			$str_where = ' WHERE '.implode(" AND ",$arr_where);
		}

		if (count($order)>=1) {
			$arr_order = array();
		    foreach ( $order as $key => $value ) {
		    	$arr_order[] = "{$key} {$value}";
		    }
	    	$str_order = ' ORDER BY '.implode(" ,",$arr_where);
	    }
		 
    	$sql = "SELECT * FROM {$table} {$str_where} {$str_order}";
    	$stmt = $this->connect->prepare($sql);
    	$stmt->execute($arr_params);
    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	} 

	private function update($table,$row,$where) {
		$arr_params = array();
		$arr_set = array();
		$arr_where = array();

	    foreach ( $row as $key => $value ) {
	    	$param_name = ':set_'.$key;
	    	$arr_set[] = "{$key} = {$param_name}";
	    	if (empty($value)) {
	    		$arr_params[$param_name]=null;	
	    	} else {
	    		$arr_params[$param_name]=$value;
	    	}
	    }

	    foreach ( $where as $key => $value ) {
	    	$param_name = ':where_'.$key;
	    	$arr_where[] = "{$key} = {$param_name}";
	    	$arr_params[$param_name]=$value;
	    }

	    if (count($arr_set)==0) {
	    	throw new Exception(" nothing was set in update ");
	    }
	    if (count($arr_where)==0) {
	    	throw new Exception(" wrong 'where' expression in update ");
	    }

	    $str_set = implode(", ",$arr_set);
	    $str_where = implode(" AND ",$arr_where);
    	$sql = "UPDATE {$table} SET {$str_set} WHERE {$str_where}";
    	$stmt = $this->connect->prepare($sql);
    	$stmt->execute($arr_params);
	} 

	public function create() {
		$class = 'App\Models\\'.$this->model;
		$obj = new $class;
		$obj->setContainer($this->container);
		$obj->setMapper($this);
		return $obj;
	} 

 	public function build($prop) {
 		$obj = $this->create();
 		foreach ( $prop as $key => $value ) {
			if (property_exists($obj,$key)) {
				$obj->{$key} = $value;
			} else {
				throw new Unknown_Property(" unknown property '{$key}' in class {$this->model}");
			}
		}
 		return $obj; 
 	}

	public function save(&$obj){
		$row=$obj->row();
		if ($obj->id) {
			$where=['id'=>$obj->id];
			$this->update($this->model,$row,$where);
		} else {	
			$obj->id=$this->insert($this->model,$row);
		}
	}

	public function destroy(&$obj){
		if (!$obj->id) {
			throw new No_Data_Found(" not exists, id is null "); 
		}
		$this->delete($this->model,['id'=>$obj->id]);
		$obj=null;
	}	

/*	
	private function connect() {
		return $this->container['db_connect'];
	}

	public function beginTransaction(){
		$this->connect()->beginTransaction();
	}
	public function commit() {
		$this->connect()->commit();
	}
	public function rollBack() {
		$this->connect()->rollBack();
	}
	*/
}