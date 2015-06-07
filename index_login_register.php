<?php  
require_once 'core/init.php';
$user = DB::getInstance()->update('users', 3, array(
	'username' => 'Dale',
	'password' => 'new_password',
	'salt' => 'salt'
	));


?>