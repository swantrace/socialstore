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
						<form action="register-process.php" method="post">
							<input name="username" type="text" placeholder="Name" required />
							<input name="email" type="email" placeholder="Email Address" required />
							<input name="password" type="password" placeholder="Password" required />
							<button name="submit" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include('inc/footer.php') ?>s