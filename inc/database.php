<?php  

// remove before flight
ini_set('display_errors', 'On');

// mysql hostname
$hostname = 'localhost';

// mysql dbname
$dbname = 'socialstore';

// mysql username
$username = 'root';

// mysql password
$password = '';

try{
	$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
	echo $e->getMessage();
	die();
}



?>