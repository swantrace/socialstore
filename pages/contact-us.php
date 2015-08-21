<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$subject = trim($_POST["subject"]);
	$message = trim($_POST["message"]);

	// the fields name, email, and message are required
	if ($name == "" OR $email == "" OR $subject == "" OR $message == "") {

		$error_message = "You must specify a value for name, email address, and message.";

	}


	// this code checks for malicious code attempting 
	// to inject values into the email header

	if (!isset($error_message)) {
		foreach($_POST as $value){
			if( stripos($value, 'Content-Type:') !== FALSE){
				$error_message = "There was a problem with the information you entered.";
			}
		}
	}

	// the field named address is used as a spam honeypot
	// it is hidden from users, and it must be left blank
	if (!isset($error_message) && $_POST["address"] != ""){
		$error_message = "Your form submission has an error.";
	}

	require_once("inc/phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();

    if (!$mail->ValidateAddress($email)){
    	echo "You must specify a valid email address";
    }	
	
    if (!isset($error_message)){
		$email_body = "";
		$email_body .= $email_body . "Name: " . $name . "\n";
		$email_body .= $email_body . "Email: " . $email . "\n";
		$email_body .= $email_body . "Subject: " . $subject . "\n";
		$email_body .= $email_body . "Message: " . $message;

		$mail->SetFrom($email, $name);
		$address = "frederickhong.5@gmail.com";
		$mail->AddAddress($address, "Qixuan Hong");
		$mail->Subject = $subject;
		$mail->MsgHTML($email_body);

		// if the email is sent successfully, redirect to a Thank you page
		// otherwise, set a new error message
		if ($mail->Send()){
			header("Location: contact-us.php?status=thanks");
			exit;
		} else {
			$error_message = "There was a problem sending the email: " . $mail->ErrorInfo;
		}

	}
}



?>
<?php $page_title = "Contact"; ?>
<?php include('templates/header.php') ?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5146.970495422808!2d-97.20536840293273!3d49.833339239880004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea751c2e1cdfe1%3A0x766a56ab28f1942e!2s10+Wingate+Ct%2C+Winnipeg%2C+MB+R3P+2L5!5e0!3m2!1sen!2sca!4v1431013966088" width="100%" height="400" frameborder="0" style="border:0"></iframe>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
			            <?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
			                <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
			            <?php } else { ?>
			            <?php     if (!isset($error_message)) {
			                        echo '<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>';
			                      } else {
			                        echo '<p class="message">' . $error_message . '</p>';
			                      }
			                  }
			            ?>


				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="contact-us.php">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control"  placeholder="Name" value="<?php echo isset($name)?htmlspecialchars($name):""; ?>">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo isset($email)?htmlspecialchars($email):""; ?>">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject" value="<?php echo isset($subject)?htmlspecialchars($subject):""; ?>">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"><?php echo isset($message)?htmlspecialchars($message):""; ?></textarea>
				            </div>
				            <?php // the field named address is used as a spam honeypot ?>
                            <?php // it is hidden from users, and it must be left blank ?>
                            <table>
                            	<tr style="display: none;">
		                            <th>
		                                <label for="address">Address</label>
		                            </th>
		                            <td>
		                                <input type="text" name="address" id="address">
		                                <p>Humans (and frogs): please leave this field blank.</p>
		                            </td>
		                        </tr>	
                            </table>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>Blue Lotus Web Solutions.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
<?php include('templates/footer.php') ?>