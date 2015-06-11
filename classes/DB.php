<?php 
class DB{
	// singleton pattern which allows only one object to be instantiated
	private static $_instance = null;
	// $_pdo PDO(represents a connection between PHP and a database server)
	// $_query PDOStatement(represents a prepared statement and, after the statement is executed, an associated result set) PDO::prepare(String $statement)
	// $_error boolean(represents the result of executing a prepared statement) PDOStatement::execute()
	// $_results Object(represents an anonymous object with property names that correspond to the column names returned in the result set) PDOStatement::fetchAll(PDO::FETCH_OBJ)
	// $_count integer(returns the number of rows affected by the last DELETE, INSERT, or UPDATE statement executed by the corresponding PDOStatement object.) PDOStatement::rowCount()
	private $_pdo, 
	        $_query, 
	        $_results, 
	        $_count = 0;

	private function __construct(){
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new self();
		}
		return self::$_instance;	
	}


	// return the only object of DB class
	// method that can support all kinds of query statement
	// need two parameters, "statement with question marks" and "parameters" that to be used
	private function query($sql, $params=array()){
		try{
			$this->_query = $this->_pdo->prepare($sql);
		} catch(PDOException $e) {
			die($e->getMessage());
		}
		$x = 1;
		if(count($params)){
			foreach($params as $param){
				$this->_query->bindValue($x, $param);
				$x++;
			}
		}
		try{
			$this->_query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}
		return $this;
	}

	// return the only object of DB class
	// method which help to build get, delete methods
	private function action($action, $table, $where=array()){
		if(count($where) === 3){
			$operators = array('=', '>', '<', '>=', '<=');
			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];
			if(in_array($operator, $operators)){
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				return $this->query($sql, array($value));
			}
		}
		die("DB::action(), wrong number of parameters for \$where");
	}

	// return the only object of DB class
	// method to simplify SELECT statement
	public function get($table, $where){
		return $this->action("SELECT *", $table, $where);
	}

	// return the only object of DB class
	// method to simplify DELECT statement
	public function delete($table, $where){
		return $this->action('DELETE', $table, $where); 
	}

	// return the only object of DB class
	// method to simplify INSERT statement
	public function insert($table, $fields = array()){
		$keys = array_keys($fields);
		$values = null;
		$x = 1;
		foreach($fields as $field){
			$values .= '?';
			if($x<count($fields)){
				$values .= ', ';
			}
			$x++;
		}
		$sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) ."`) VALUES ({$values})";
		return $this->query($sql, $fields);
	}

	// return the only object of DB class
	// method to simplify UPDATE statement
	public function update($table, $id, $fields = array()){
		$set = '';
		$x = 1;
		foreach($fields as $name=>$value){
			$set .= "{$name} = ?";
			if($x <count($fields)){
				$set .= ', ';
			}
			$x++;
		}
		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
		return $this->query($sql, $fields);
	}

	public function fetchResults(){
		$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
		return $this->_results;
	}

	public function calRows(){
		$this->_count = $this->_query->rowCount();
		return $this->_count;
	}

	public function pdo(){
		return $this->_pdo;
	}


	public function first(){
		return $this->fetchResults()[0];
	}

}