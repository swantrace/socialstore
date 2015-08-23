<?php  
class Helper{
	
	static function get_number_of_products($products){
		return count($products);
	}


	static function get_list_view_html($product){
		$output = "";
		$output .= '<div class="col-sm-4">';
		$output .= '<div class="product-image-wrapper">';
		$output .= '<div class="single-products">';
		$output .= '<div class="productinfo text-center">';
		$output .= '<img src="' . BASE_URL . $product->img . '" alt="" />';
		$output .= '<h2>$'. $product->price .'</h2>';
		$output .= '<a href="' . BASE_URL . '?page=product&sku=' . $product->sku . '"><p>' . $product->name . '</p></a>';
		$output .= Cart::activeButton($product->id);
		$output .= '</div>';
		// $output .= '<div class="product-overlay">';
		// $output .= '<div class="overlay-content">';
		// $output .= '<h2>$' . $product->price . '</h2>';
		// $output .= '<a href="' . BASE_URL . '?page=product&sku=' . $product->sku . '"><p>' . $product->name . '</p></a>';
		// $output .= Cart::activeButton($product->id);
		// $output .='</div>';
		// $output .='</div>';
		$output .='</div>';
		$output .='<div class="choose">';
		$output .='<ul class="nav nav-pills nav-justified">';
		$output .='<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>';
		$output .='<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>';
		$output .='</ul>';
		$output .='</div>';
		$output .='</div>';
		$output .='</div>';
		return $output;
	} 
}


