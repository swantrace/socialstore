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
		$this->_data->sizes = Product::getProductSizesById($id);
		$this->_data->categories = Product::getProductCategoriesById($id);
	}

    public static function getProductSizesById($id){
    	$sizes = array();
    	$sql = "SELECT size FROM sizes INNER JOIN products_sizes ON sizes.id = products_sizes.size_id WHERE products_sizes.product_id = ? ORDER BY sizes.order";
    	$temp_sizes = DB::getInstance()->query($sql, array($id))->fetchResults();
    	foreach($temp_sizes as $temp_size){
    		$sizes[] = $temp_size->size;
    	}
    	return $sizes;
    }

    public static function getProductCategoriesById($id){
    	$categories = array("category A", "category B", "category C");
    	return $categories;
    }



	// return info of all the products 
	public static function getAllProducts(){
		$sql = "SELECT * FROM products ORDER BY id";
		$all_products_data = DB::getInstance()->query($sql, array())->fetchResults();
		return $all_products_data;
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

   // return boolean, if a product with an id of $id exists in the database return true, otherwise return false
	public static function productExistsBySKU($sku){
		if(isset($sku)){
			$data = DB::getInstance()->get('products', array('sku', '=', $sku));
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

	public static function getProductBySKU($sku){
		if (Product::productExistsBySKU($sku)){
			$id = DB::getInstance()->get('products', array('sku', '=', $sku))->first()->id;
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

	public static function getRecentProducts($num = 6){
		$sql = "SELECT * FROM products ORDER BY id DESC LIMIT ?";
        $array = array($num);
		$recent_products_data = DB::getInstance()->query($sql,[$num],PDO::PARAM_INT)->fetchResults();
		$recent_products_data = array_reverse($recent_products_data);
		return $recent_products_data;
	}

	public static function getProductsNumber(){
		$sql = "SELECT COUNT(id) FROM products";
		$number = DB::getInstance()->query($sql)->getQuery()->fetchColumn(0);
    	return intval($number);
	}

	public static function getSubsetProducts($positionStart, $positionEnd){
		// echo $positionStart . "<br>" . $positionEnd;
		// die();
    	$offset = $positionStart - 1;
    	$rows = $positionEnd - $positionStart + 1;
    	$sql = "SELECT * FROM products ORDER BY id LIMIT ?, ?";
		$subset_products_data = DB::getInstance()->query($sql, [$offset, $rows], PDO::PARAM_INT)->fetchResults();
		return $subset_products_data;
	}

}


?>