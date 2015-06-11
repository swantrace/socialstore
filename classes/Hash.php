<?php  
class Hash{
	// return hashed string, the hashing algorithm is sha256
	public static function make($string, $salt=''){
		return hash('sha256', $string . $salt);
	}
	// return an initialization vector with the size of $length
	public static function salt($length){
		return mcrypt_create_iv($length);
	}
	// return a unique hashed string
	public static function unique(){
		return self::make(uniqid());
	}
}




?>