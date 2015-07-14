<?php
require_once("../core/init.php");
$products = Product::getAllProducts(); 

function get_number_of_products(){
	global $products;
	return count($products);
}


function get_list_view_html($product){
	$output = "";
	$output .= '<div class="col-sm-4">';
	$output .= '<div class="product-image-wrapper">';
	$output .= '<div class="single-products">';
	$output .= '<div class="productinfo text-center">';
	$output .= '<img src="' . BASE_URL . $product->img . '" alt="" />';
	$output .= '<h2>$'. $product->price .'</h2>';
	$output .= '<a href="#"><p>' . $product->name . '</p></a>';
	$output .= '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
	$output .= '<input type="hidden" name="cmd" value="_s-xclick">';
	$output .= '<input type="hidden" name="hosted_button_id" value="'. $product->paypal . '">';
	$output .= '<input type="hidden" name="item_name" value="' . $product->name . '">';
	$output .= '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">';
	$output .= '<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">';
	$output .= '</form>';
	$output .= '</div>';
	$output .= '<div class="product-overlay">';
	$output .= '<div class="overlay-content">';
	$output .= '<h2>$' . $product->price . '</h2>';
	$output .= '<a href="' . BASE_URL . 'products/' . $product->sku . '/"><p>' . $product->price . '</p></a>';
	$output .='<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
	$output .='<input type="hidden" name="cmd" value="_s-xclick">';
	$output .='<input type="hidden" name="hosted_button_id" value="' . $product->paypal . '">';
	$output .='<input type="hidden" name="item_name" value="' . $product->name . '">';
	$output .='<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">';
	$output .='<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">';
	$output .='</form>';
	$output .='</div>';
	$output .='</div>';
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

?>