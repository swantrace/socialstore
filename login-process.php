<?php  
require_once 'core/init.php';
$errors = array();
if(Token::check(Input::get('token'))){
	$validate = new Validate();
	$validation = $validate->check(array(
		'username' => array('required' => true),
		'password' => array('required' => true)
	));

	if($validation->passed()){
		// log user in
		$user_id = User::getUserIDByUsernameAndPassword(Input::get('username'), Input::get('password'));
		echo 'hello step 1';
		if ($user_id != false){
			$user = new User($user_id);
			$remember = (Input::get('remember') === 'on')?true:false;
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);
			if($login){
				Redirect::to('index.php');
			} else {
				$errors[] = '<p>Sorry, logging in failed</p>';
				Session::put('error_login', $errors);
				Redirect::to('login.php');
			}
		} else {
			$errors[] = 'Wrong username and/or password';
			Session::put('error_login', $errors);
			Redirect::to('login.php');
		}
	}else{
		Session::put('error_login', $validation->errors());
		Redirect::to('login.php');
	}
}



?>