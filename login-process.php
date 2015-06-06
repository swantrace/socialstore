<?php  
session_start();
require_once('inc/config.php');
require_once(ROOT_PATH . 'inc/database.php'); 
if(isset($_SESSION['user_id'])){
	header('Location:account.php');
}

if (isset($_POST['submit'])){
	$error = array();

	//username
	if (empty($_POST['username'])) {
		$error[] = 'Please enter a username';
	}elseif (!ctype_alnum($_POST['username'])) {
		$error[] = 'Username must consists of letters and numbers only';
	}else{
		$username = $_POST['username'];
	}


    //password
    if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
	
	if(empty($error)){
		try{
			$users = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
			$users->bindParam(1, $username);
			$users->bindParam(2, $password);
			$users->execute();
			$currentUser = $users->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			$error[] = $e->getMessage();
		}
		if ($currentUser == false){
			$error[] = "Your username or/and email has been used";
		}else{
			$_SESSION['user_id'] = $currentUser['user_id'];
			header("Location:account.php"); 
		}
	}


	if(!empty($error)){
		$error_message = implode('.', $error);
		$_SESSION['login_error_message'] = $error_message;
		header("Location:http://localhost/Projects/SocialStore/login.php");
	} else {
		$email_message = "To activate your account, please click on this link: \n\n";
		$email_message .= "http://localhost/Projects/SocialStore/activate.php?email=". urlencode($email) . "&key=$activation";
		mail($email, 'Registration Confirmation', $message);
		$_SESSION['login_error_message'] = "Thank you for registering! A confirmation email has been sent to your email address. Please click on the activation link to activate your account";
		header("Location: http://localhost/Projects/SocialStore/login.php");
	}
	
}


?>