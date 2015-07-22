<?php  
class Dbase{
	private $_conndb = false;
	public $last_query = null;
	public $affected_rows = 0;
	public $insert_keys = array();
	public $insert_values = array();
	public $update_sets = array();
}



?>		