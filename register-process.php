<?php  
session_start();
require_once('inc/config.php');
require_once(ROOT_PATH . 'inc/database.php'); 
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

	//email
    if(empty($_POST['email'])){
        $error[] = 'Please enter your email. ';
    }elseif(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$error[] = 'Your e-mail address is invalid. ';
    }else{
		$email = mysql_real_escape_string($_POST['email']);
    }

    //password
    if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
	
	if(empty($error)){
		try{
			$users = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR username = ?");
			$users->bindParam(1, $email);
			$users->bindParam(2, $username);
			$users->execute();
			$users_number = $users->fetchColumn();
		}catch(PDOException $e){
			$error[] = $e->getMessage();
		}
		if (!$users_number == 0){
			$error[] = "Your username or/and email has been used";
		} else {
			$activation = md5(uniqid(rand(), true));
			try{
				$insert_tempuser = $db->prepare("INSERT INTO tempusers
					(user_id, username, email, password, activation) VALUES 
					('', '$username', '$email', '$password', '$activation')");
				$insert_tempuser->execute();
				if(!$insert_tempuser){
					$insert_tempuser_error = $insert_tempuser->errorInfo();
					$error[] = $insert_tempuser_error[2];
				}
			}catch(PDOException $e){
				$error[] = $e->getMessage();
			}			
		}
	}


	if(!empty($error)){
		$error_message = implode('.', $error);
		$_SESSION['signup_error_message'] = $error_message;
		header("Location:http://localhost/Projects/SocialStore/login.php");
	} else {
		$email_message = "To activate your account, please click on this link: \n\n";
		$email_message .= "http://localhost/Projects/SocialStore/activate.php?email=". urlencode($email) . "&key=$activation";
		mail($email, 'Registration Confirmation', $message);
		$_SESSION['signup_error_message'] = "Thank you for registering! A confirmation email has been sent to your email address. Please click on the activation link to activate your account";
		header("Location: http://localhost/Projects/SocialStore/login.php");
	}
	
}


?>