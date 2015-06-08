<?php  
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
				)
			));
		if($validation->passed()){
			//update
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
		<label for="name">Name</label>
		<input type="text" name="email" value="<?php echo escape($user->data()->email); ?>">
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> 
		<input type="submit" value="Update">
	</div>
</from>

