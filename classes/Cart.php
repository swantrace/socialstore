<?php

class Cart {
	protected $products = [];

	public function __construct($products = []) {
		$this->products = $products;
	}

	public static function activeButton($product_id) {
		if(isset($_SESSION['cart']['product_id'])) {
			$status = 0;
			$button_text = "Remove from Cart";
		} else {
			$status = 1;
			$button_text = "Add to Cart";
		}

		$out  = '<a href="#" class="btn btn-default';
		$out .= $status == 0 ? ' btn-add' : ' btn-remove';
		$out .= ' btn-' . $product_id . '_' . $status;
		$out .= '">' . $button_text . '</a>';
		return $out;
	}
}