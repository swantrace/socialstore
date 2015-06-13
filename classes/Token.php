<?php  

class Token{
	// return boolean
	// create a session variable with a name of token and a value of md5(uniqid())
	public static function generate(){
		if(Session::put(Configure::get('session/token_name'), md5(uniqid()))){
			return Session::get(Configure::get('session/token_name'));
		}
		return false;
	}
	// return boolean
	// check if parameter $token equals to saved session variable $_SESSION['token']
	public static function check($token){
		$tokenName = Configure::get('session/token_name');
		if(Session::exists($tokenName) && $token === Session::get($tokenName)){
			Session::delete($tokenName);
			return true;
		} else {
			return false;
		}
	}
}