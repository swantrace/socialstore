<?php require_once("./inc/config.php");?>
<?php 
session_start();
require_once(ROOT_PATH . 'inc/database.php'); 
session_destroy();
header("Location:". BASE_URL . "index.php");
?>