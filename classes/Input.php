<?php 
class Input{
	// return boolean, parameters "post", "get"
	// method used to test whether this page has $_POST/$_GET variables
	public static function exists($type="post"){
		switch($type){
			case 'post':
				return (!empty($_POST))?true:false;
			break;
			case 'get':
				return (!empty($_GET))?true:false;
			break;
			default:
				return false;
			break;
		}
	}
	// return string 
	// get value of $_POST or $_GET array with a specific name of $item
	public static function get($item){
		if(isset($_POST[$item])){
			return $_POST[$item];
		} elseif ($_GET[$item]) {
			return $_GET[$item];
		}
		return '';
	}
}