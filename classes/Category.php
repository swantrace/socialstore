<?php  
class Category{

	private $_db;
	private $_data;

	public function __construct($id = null, $fields = array()){
		$this->_db = DB::getInstance();
		if(isset($id)){
			$this->_data = $this->_db->get('categories', array('id', '=', $id))->first();
		} else {
			$this->_db->insert('categories', $fields);
			$id = $this->_db->pdo()->lastInsertId();
			$this->_data = $this->_db->get('categories', array('id', '=', $id))->first();
		}
	}


	public static function getAllCategories() {
		$sql = "SELECT * FROM categories ORDER BY id";
		$all_categories_data = DB::getInstance()->query($sql, array())->fetchResults();
		return $all_categories_data;
	}

	public function getCategoryProducts(){
		$id = $this->_data->id;
		$sql = "SELECT * FROM products INNER JOIN products_categories ON products.id = products_categories.product_id WHERE products_categories.category_id = ?";	
		$products_data =  $this->_db->query($sql, array($id))->fetchResults();
    	return $products_data;
	}
}



?>