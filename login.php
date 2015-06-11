<?php require_once("./inc/config.php");?>
<?php $page_title = "Login"; ?>
<?php 
session_start();
require_once(ROOT_PATH . 'inc/database.php'); 
require_once(ROOT_PATH . 'inc/function.php');
if (isset($_SESSION['user_id'])) {
	try {
		$messages = $db->prepare("SELECT COUNT(*) FROM messages WHERE receiver = ? AND status = 'unread'");
		$messages->bindParam(1, $_SESSION['user_id']);
		$messages->execute();
		$message_number = $results->fetchColumn();
	} catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
}
?>



<?php  
// new code
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

		if($validation->passed()){
			// register user
			$user = new User();
			$salt = Hash::salt(32);
			try {
				$user->create(array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'email' => Input::get('email'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1
					));
				Session::flash('home', 'You have been registered and can now log in!.');
				Redirect::to('index.php');
			} catch (Exception $e) {
				die($e->getMessage());
			}

		} else {
			foreach($validation->errors() as $error){
				echo $error, '<br>';
			}
		}
	}

}



?>

<?php include(ROOT_PATH . 'inc/header.php'); ?>	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<span class="error alert"><?php 
							if(isset($_SESSION['login_error_message'])){
								echo $_SESSION['login_error_message'];
							}
						?></span>
						<form action="login-process.php" method="post">
							<input name="username" type="text" placeholder="Name" required />
							<input name="email" type="email" placeholder="Email Address" required />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<span class="error alert"><?php 
							if(isset($_SESSION['signup_error_message'])){
								echo $_SESSION['signup_error_message'];
							}
						?></span>
						<!-- <form action="register-process.php" method="post"> -->
						<form action="" method="post">
							<input name="username" type="text" placeholder="Name" value="<?php echo Input::get('username'); ?>" required />
							<input name="email" type="email" placeholder="Email Address" value="<?php echo Input::get('email'); ?>" required />
							<input name="password" type="password" placeholder="Password" required />
							<input name="password_again" type="password" placeholder="Password Again" required />
							<input name="token" type="hidden" value="<?php Token::generate(); ?>" />
							<button name="submit" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include('inc/footer.php') ?>s