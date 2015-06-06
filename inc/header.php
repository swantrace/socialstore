<?php 
$site_name = "Blue Lotus" 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo "$page_title | $site_name" ?></title>
    <link href="<?php echo BASE_URL ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>css/price-range.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>css/animate.css" rel="stylesheet">
	<link href="<?php echo BASE_URL ?>css/main.css" rel="stylesheet">
	<link href="<?php echo BASE_URL ?>css/responsive.css" rel="stylesheet">
	<link href="<?php echo BASE_URL ?>css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo BASE_URL ?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo BASE_URL; ?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo BASE_URL; ?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo BASE_URL; ?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo BASE_URL; ?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo BASE_URL; ?>index.php"><img src="<?php echo BASE_URL; ?>images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="<?php echo BASE_URL; ?>checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="<?php echo BASE_URL; ?>cart.php" class="active"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php if (!isset($_SESSION['user_id'])): ?>
									<li><a href="<?php echo BASE_URL; ?>login.php"><i class="fa fa-lock"></i> Login</a></li>
								<?php else: ?>
									<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
									<li><a href="message_inbox.php"><i class="fa fa-user"></i> Messages(<?php echo $message_number; ?>)</a></li>
									<li><a href="additem.php"><i class="fa fa-user"></i> Add Item</a></li>
								<?php endif; ?>		
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo BASE_URL; ?>index.php" class="<?php echo $page_title === "Home"?"active":""; ?>">Home</a></li>
								<li><a href="<?php echo BASE_URL; ?>products/" class="<?php echo $page_title === "Shop"?"active":""; ?>">Shop</a></li> 
								<li><a href="<?php echo BASE_URL; ?>blog.php" class="<?php echo $page_title === "Blogs"?"active":""; ?>">Blog</a></li> 
								<li><a href="<?php echo BASE_URL; ?>contact-us.php" class="<?php echo $page_title === "Contact"?"active":""; ?>">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form class="pull-right search_form search_box" name="input" action="search.php" method="get">
								<select id="category" name="category"><?php createCategoryList() ?></select>
								<input type="text" id="keywords" name="keywords"  placeholder="Search" />
							</div>
						</form>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->