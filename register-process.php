<?php 
require_once 'core/init.php';  
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'min' => 2,
				'max' => 20,
				'unique' => 'users'
			),
			'password' => array(
				'required' => true,
				'min' => 6
			),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'
			),
			'email' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
			)
		));

		print_r($validation->errors());
		if($validation->passed()){
			$salt = Hash::salt(32);
			try {
				$user = User::createUser(array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'email' => Input::get('email'),
					'joined' => date('Y-m-d H:i:s'),
					'group_id' => 1
					));
				// die('I am here');
				$email_message = "To activate your account, please click on this link: \n\n";
				$email_message .= "http://localhost/Projects/SocialStore/activate.php?email=". urlencode($email) . "&key=$activation";
				mail($user->data()->email, 'Registration Confirmation', $email_message);
				Session::put('home', 'Thank you for registering! A confirmation email has been sent to your email address. Please click on the activation link to activate your account.');
				Redirect::to('login.php');
			} catch (Exception $e) {
				die($e->getMessage());
			}

		} else {
			Session::put('error_register', $validation->errors());
			Redirect::to('login.php');
		}
	}

}
?>