<?php 

class Product{ 
	// $_db DB(represents the only object of DB class) DB::getInstance
	// $_data 
	// $_sessionName string "user"
	// $_cookieName string "hash"
	private $_db;
	private $_data;

	public function __construct($id = null, $fields = array()){
		$this->_db = DB::getInstance();
		if(isset($id)){
			$this->_data = $this->_db->get('products', array('id', '=', $id))->first();
		} else {
			$this->_db->insert('products', $fields);
			$id = $this->_db->pdo()->lastInsertId();
			$this->_data = $this->_db->get('products', array('id', '=', $id))->first();
		}
	}

	// return all the products 
	public static function getAllProducts(){
		$sql = "SELECT name, price, img, sku, paypal FROM products ORDER BY sku";
		$products = DB::getInstance()->query($sql)->fetchResults();
		return $products;
	}

   // return boolean, if a product with an id of $id exists in the database return true, otherwise return false
	public static function productExistsByID($id){
		if(isset($id)){
			$data = DB::getInstance()->get('products', array('id', '=', $id));
			if($data->calRows ()){
				return true;
			}
		}
		return false;
	}	


	// return a product with id of $id or false
	public static function getProductByID($id){
		if (Product::productExistsByID($id)){
			$product = new self($id);
			return $product;
		}
		return false;
	}

    

	// return the new product created according to info in $fields
	public static function createProduct($fields = array()){
		$product = new self(null, $fields);
		return $product;
	}


	public function exists(){
		return (!empty($this->_data))?true:false;
	}



	public function data(){
		return $this->_data;
	}


	public function update($fields = array(), $id = null){
		if(!$this->_db->update('products', $id, $fields)){
			throw new Exception('There was a problem udpating');
		}
	}

}


?>