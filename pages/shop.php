<?php $products = Product::getAllProducts(); ?>
<?php require_once('products.php'); ?>
<?php
	if (empty($_GET["pg"])) {
		$current_page = 1;
	} else {
		$current_page = $_GET["pg"];
	}

	$current_page = intval($current_page);

	$total_products = Product::getProductsNumber();
	$products_per_page = 12;
	$total_pages = ceil($total_products / $products_per_page);

	if ($current_page > $total_pages) {
		header("Location: ./?pg=" . $total_pages);
	}

	// redirect too-small page numbers (or strings converted to 0) to the first page
	if ($current_page < 1) {
		header("Location: ./");
	}

	// determine the start and end shirt for the current page; for example, on
	// page 3 with 8 shirts per page, $start and $end would be 17 and 24
	$start = (($current_page - 1) * $products_per_page) + 1;
	$end = $current_page * $products_per_page;
	if ($end > $total_products) {
		$end = $total_products;
	}

	$products = Product::getSubsetProducts($start,$end);

?>
<?php $page_title = "Shop";?>
<?php include('header.php') ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="<?php echo BASE_URL; ?>img/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include 'categories-list.php'; ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php 
							foreach($products as $product) {
						    	echo get_list_view_html($product);
						    } 
						?>
						<div class="clear"></div>
						<ul class="pagination">
							<?php $i = 0; ?>
							<?php while ($i < $total_pages) : ?>
								<?php $i += 1; ?>
								<?php if ($i == $current_page) : ?>
									<li class="active"><span><?php echo $i; ?></span></li>
								<?php else : ?>
									<li><a href="./?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php include('footer.php') ?>