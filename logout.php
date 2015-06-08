<?php require_once("./inc/config.php");?>
<?php 
session_start();
require_once(ROOT_PATH . 'inc/database.php'); 
session_destroy();
header("Location:". BASE_URL . "index.php");
?>

<?php
require_once 'core/init.php';
$user = new User();
$user->logout();

Redirect::to('index.php');
