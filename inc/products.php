<?php
require_once("config.php");

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
	$output .= '<img src="../' . $product["img"] . '" alt="" />';
	$output .= '<h2>$'. $product["price"] .'</h2>';
	$output .= '<a href="#"><p>' . $product["name"] . '</p></a>';
	$output .= '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
	$output .= '<input type="hidden" name="cmd" value="_s-xclick">';
	$output .= '<input type="hidden" name="hosted_button_id" value="'. $product["paypal_id"] . '">';
	$output .= '<input type="hidden" name="item_name" value="' . $product["name"] . '">';
	$output .= '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">';
	$output .= '<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">';
	$output .= '</form>';
	$output .= '</div>';
	$output .= '<div class="product-overlay">';
	$output .= '<div class="overlay-content">';
	$output .= '<h2>$' . $product["price"] . '</h2>';
	$output .= '<a href="' . BASE_URL . 'products/' . $product["sku"] . '/"><p>' . $product["name"] . '</p></a>';
	$output .='<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
	$output .='<input type="hidden" name="cmd" value="_s-xclick">';
	$output .='<input type="hidden" name="hosted_button_id" value="' . $product["paypal_id"] . '">';
	$output .='<input type="hidden" name="item_name" value="' . $product["name"] . '">';
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



$products = array();
$products[101] = [ 
				 	"name" => "Product A", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "101",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[102] = [ 
				 	"name" => "Product B", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "102",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[103] = [ 
				 	"name" => "Product C", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "103",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[104] = [ 
				 	"name" => "Product D", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "104",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[105] = [ 
				 	"name" => "Product E", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "105",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[106] = [ 
				 	"name" => "Product F", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "106",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[107] = [ 
				 	"name" => "Product G", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "107",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[108] = [ 
				 	"name" => "Product H", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "108",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[109] = [ 
				 	"name" => "Product I", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "109",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[110] = [ 
				 	"name" => "Product J", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "110",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[111] = [ 
				 	"name" => "Product K", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "111",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
$products[112] = [ 
				 	"name" => "Product L", 
				 	"price" => 56,
				 	"img" => "images/shop/product10.jpg",
				 	"sku" => "112",
				 	"paypal_id" => "7SZTA9FJMUHC6"
				 ];
?>