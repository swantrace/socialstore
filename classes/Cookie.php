<?php
class Cookie{

	// return bool
	// test if a cookie with a name of $name exists or not
	// exist return true, not exist return false
	public static function exists($name){
		return (isset($_COOKIE[$name]))?true:false;
	}

	// retrun string
	// get cookie value which has a name of $name
	public static function get($name){
		return $_COOKIE[$name];
	}

	// return bool
	// set a cookie with 
	// a name of $name, 
	// a value of $value, 
	// a expiry time of time()+$expiry,
	// and it can be accessed in every page under this domain
	// success return true, failure return false 
	public static function put($name, $value, $expiry){
		if(setcookie($name, $value, time()+$expiry, '/')){
			return true;
		}
		return false;
	}

	// return bool
	// call Cookie::put method to set the cookie which is with a name of $name
	// a value of "" and expired directly
	// success return true, failure return false
	public static function delete($name){
		self::put($name, '', time() - 1);
	}
}