<?php
$categories_data = Category::getAllCategories();
?>
<div class="left-sidebar categories-list">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		<?php foreach ($categories_data as $category_data): ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="<?php echo BASE_URL . '?page=category&category_id=' . $category_data->id;?>"
						   class='<?php echo $category_data->id == Url::getParameter('category_id') ? "active" : "";?>'>
							<?php echo $category_data->category;?>
						</a>
					</h4>
				</div>
			</div>
		<?php endforeach;?>
	</div><!--/category-products-->

	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
				<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
				<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
				<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
				<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
				<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
				<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
			</ul>
		</div>
	</div><!--/brands_products-->

	<div class="price-range"><!--price-range-->
		<h2>Price Range</h2>
		<div class="well">
			 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
			 <b>$ 0</b> <b class="pull-right">$ 600</b>
		</div>
	</div><!--/price-range-->

	<div class="shipping text-center"><!--shipping-->
		<img src="<?php echo BASE_URL;?>img/home/shipping.jpg" alt="" />
	</div><!--/shipping-->
</div>