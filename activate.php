<?php 

require_once('inc/config.php');
require_once(ROOT_PATH . 'inc/database.php');

if(isset($_GET['email']) && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_GET['email'])){
	$email = mysql_real_escape_string($_GET['email']);
}

if(isset($_GET['key']) && (strlen($_GET['key']) == 32)){
	$key = mysql_real_escape_string($_GET['key']);
}

if(isset($email) && isset($key)){
	try{
		$result = $db->prepare("SELECT * FROM tempusers WHERE email=? AND activation=?");
		$result.bindParam(1, $email);
		$result.bindParam(2, $key);
		$result.execute();
	} catch(PDOException $e) {
      echo $e->getMessage();
      die();
  	}

  	$pending_user = $result->fetch(PDO::FETCH_ASSOC);
  	if ($pending_user){
  		$user_id = mysql_real_escape_string($pending_user['user_id']);
   		$username = mysql_real_escape_string($pending_user['username']);
   		$email = mysql_real_escape_string($pending_user['email']);
   		$password = mysql_real_escape_string($pending_user['password']);
  	}


	try{
		$result1 = $db->prepare("INSERT INTO users (user_id, username, email, password, role, credits) VALUES ('', '$username', '$email', '$password', 'user', 0)");
		$result1->execute();
	}catch(PDOException $e) {
      echo $e->getMessage();
      die();
  	}

  	try{
  		$result2 = $db->prepare("DELETE FROM tempusers WHERE user_id=?");
  		$result2->bindParam(1, $user_id);
  		$result2->execute();
  	}catch(PDOException $e){
  		echo $e->getMessage();
  		die();
  	}

  	if (!$result1){
  		echo "Oops your account could not be activated, please contact the system admin";
  	}else{
  		header('Location:login.php');
  	}
} else {
	echo "Error, please contact the system admin!";
}
