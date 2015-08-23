<?php
if(!isset($_SESSION)) {
	session_start();
}

// new add
if(isset($_SERVER['SERVER_NAME'])) defined("BASE_URL") || define("BASE_URL", "http://" . $_SERVER['SERVER_NAME'] . "/");
defined("DS") || define("DS", DIRECTORY_SEPARATOR);
defined("PAGES_DIR") || define("PAGES_DIR", "pages");
// new add

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

if(Cookie::exists(Configure::get('remember/cookie_name')) && !Session::exists(Configure::get('session/session_name'))){
	$hash = Cookie::get(Configure::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->calRows()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();

	}
}


?>