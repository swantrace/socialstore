<?php 
require_once("core/init.php");
$page_title = "Login & Register"; 
?>
<?php include(ROOT_PATH . 'inc/header.php'); ?>	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
                    	<div class="errors">
                    		<?php  
                    			if(Session::exists('error_login')){
                    				echo Session::flash('error_login');
                    			}
                    		?>
                    	</div>
						<form action="login-process.php" method="post">
							<input name="username" type="text" placeholder="Name" required />
							<input name="password" type="password" placeholder="Password" required />
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
						<div class="notification">
							<?php
								if(Session::exists('home')){
	                            	echo Session::flash('home'); 
	                            }
	                        ?>
                    	</div>
                    	<div class="errors">
                    		<?php  
                    			if(Session::exists('error_register')){
                    				echo Session::flash('error_register');
                    			}
                    		?>
                    	</div>
						<!-- <form action="register-process.php" method="post"> -->
						<form action="register-process.php" method="post">
							<input name="username" type="text" placeholder="Name" value="<?php echo Input::get('username'); ?>" required />
							<input name="email" type="email" placeholder="Email Address" value="<?php echo Input::get('email'); ?>" required />
							<input name="password" type="password" placeholder="Password" required />
							<input name="password_again" type="password" placeholder="Password Again" required />
							<input name="token" type="hidden" value="<?php echo Token::generate(); ?>" />
							<button name="submit" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include('inc/footer.php') ?>s