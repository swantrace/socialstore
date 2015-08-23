<?php
$products = Product::getAllProducts(); 
if (empty($_GET["pg"])) {
	$current_page = 1;
} else {
	$current_page = intVal($_GET["pg"]);
}
$num_of_products_per_page = $GLOBALS['config']['pagination']['products_shop'];
$paging = new Paging($products, $current_page, $num_of_products_per_page);
$current_page_products_range = $paging->get_current_page_products_range();
$start = $current_page_products_range['start'];
$length = $current_page_products_range['length'];
$current_page_products = array_slice($products, $start, $length);	 

?>
<?php $page_title = "Shop";?>
<?php include('templates/header.php') ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="<?php echo BASE_URL; ?>img/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include 'templates/categories-list.php'; ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php 
							foreach($current_page_products as $product) {
						    	echo Helper::get_list_view_html($product);
						    } 
						?>
						<div class="clear"></div>
						<?php 
							echo $paging->paginationHTML(); 
						?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php include('templates/footer.php') ?>