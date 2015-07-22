<?php
// session_start();
// require_once(ROOT_PATH . 'inc/database.php'); 
// session_destroy();
// header("Location:". BASE_URL . "index.php");
$user = new User();
$user->logout();

Redirect::to(BASE_URL);
