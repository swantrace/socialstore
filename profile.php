<?php  
require_once 'core/init.php';
$user = User::getCurrentUser();
$data = $user->data();
?>
<h3>Username: <?php echo escape($data->username); ?></h3>
<p>Email:<?php echo escape($data->email) ?></p>
<?php