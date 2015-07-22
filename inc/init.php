<?php
require_once __DIR__ . '\config.php';
spl_autoload_register(function($class){
	require_once ROOT_PATH . DS . CLASSES_DIR . DS . $class . '.php';
});


if(Cookie::exists(Configure::get('remember/cookie_name')) && !Session::exists(Configure::get('session/session_name'))){
	$hash = Cookie::get(Configure::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->calRows()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();

	}
}


?>