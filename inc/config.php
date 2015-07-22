<?php
if(!isset($_SESSION)) {
	session_start();
}


// site domain name with http
defined("BASE_URL") || define("BASE_URL", "http://" . $_SERVER['SERVER_NAME'] . "/Projects/SocialStore/");

// directory separator
defined("DS") || define("DS", DIRECTORY_SEPARATOR);

// root path
defined("ROOT_PATH") || define("ROOT_PATH", realpath(dirname(__FILE__) . DS . ".." . DS));

// classes folder
defined("CLASSES_DIR") || define("CLASSES_DIR", "classes");

// pages folder
defined("PAGES_DIR") || define("PAGES_DIR", "pages");

// modules folder
defined("MOD_DIR") || define("MOD_DIR", "mod");

// inc folder
defined("INC_DIR") || define("INC_DIR", "inc");

// templates folder
defined("TEMPLATES_DIR") || define("TEMPLATES_DIR", "templates");

// emails path
defined("EMAILS_PATH") || define("EMAILS_PATH", "emails");

// catalogue images path
defined("CATALOGUE_PATH") || define("CATALOGUE_PATH", ROOT_PATH . DS . "media" . DS . "catalogue");


// add all above directories to the include path
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(ROOT_PATH.DS.INC_DIR),
	realpath(ROOT_PATH.DS.CLASSES_DIR),
	realpath(ROOT_PATH.DS.PAGES_DIR),
	realpath(ROOT_PATH.DS.MOD_DIR),
	realpath(ROOT_PATH.DS.TEMPLATES_DIR),
	get_include_path()
)));

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




?>