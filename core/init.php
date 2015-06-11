<?php  
session_start();
define("BASE_URL","/Projects/SocialStore/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/Projects/SocialStore/");
$GLOBALS['config'] = array(
	'mysql' => array(
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'db' => 'socialstore'
		),
	'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => 604800
		),
	'session' => array(
			'session_name' => 'user',
			'token_name' => 'token'
		)
	);

spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->calRows()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();

	}
}


?>