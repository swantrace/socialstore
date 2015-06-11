<?php 
class Session{
	// return boolean 
	//test if a session variable with specific name of $name exists or not
	public static function exists($name){
		return (isset($_SESSION[$name]))?true:false;
	}
	// return boolean
	// create a session variable with specific name of $name and specific value of $value
	// success return true, failure return false
	public static function put($name, $value) {
		$_SESSION[$name] = $value;
		if (isset($_SESSION[$name])){
			return true;
		} else {
			return false;
		}
	}
	// return boolean
	// delete an existed session variable with specific name of $name
	// success return true, failure return false
	public static function delete($name){
		if(self::exists($name)){
			unset($_SESSION[$name]);
		}
		if (!isset($_SESSION[$name])){
			return true;
		} else {
			return false;
		}
	}
	// return the value of specific session variable with a name of $name
	public static function get($name){
		return $_SESSION[$name];
	}
	// if a session variable with a specific name of $name exists, return its value and delete the session variable from $_SESSION array
	// if a session variable with a specific name of $name doesn't exist, return "";
	public static function flash($name, $string=''){
		if(self::exists($name)){
			$flashed_string = self::get($name);
			self::delete($name);
			return $flashed_string;
		} else {
			return '';
		}
	}
}