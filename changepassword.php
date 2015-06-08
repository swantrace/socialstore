<?php  
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate new Validate();
		$validation = $validate->check($_POST, array(
			'password_current' => array(
				'required' => true,
				'min' => 6),
			'password_new' => array(
				'required' => true,
				'min' => 6),
			'password_new_again' => array(
				'required' => true,
				'min' => 6,
				'matches' => 'password_new')
			));

		if($validation->passed()){

		} else {
			foreach($validation->errors() as $error){
				echo $error, '<br>';
			}
		}
	}
}



?>

<form action="" method="post">
	<div class="field">
		<label for="password_current">Current password</label>
		<input type="password" name="password_current" id="password_current">
	</div>
	<div class="field">
		<label for="password_new">New password</label>
		<input type="password" name="password_new" id="password_new">
	</div>
	<div class="field">
		<label for="password_new_again">New password agian</label>
		<input type="password" name="password_new_again" id="password_new_again">
	</div>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Change">
</form>