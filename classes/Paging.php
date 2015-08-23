<?php

class Paging{
	private $data;
	private $current_page;
	private $item_num_per_page;
	private $item_num_total;
	private $total_pages;


	public function __construct($data, $current_page = 1, $item_num_per_page = 10) {
		$this->data = $data;
		$this->item_num_total = count($data);
		$this->item_num_per_page = $item_num_per_page;
		$this->total_pages = ceil($this->item_num_total / $this->item_num_per_page);
		if ($current_page > $this->total_pages) {
			$this->current_page = $this->total_pages;
		}
		$this->current_page = $current_page;
	}

	public function get_current_page_products_range() {

		$start = (($this->current_page - 1) * $this->item_num_per_page) + 1;
		$end = $this->current_page * $this->item_num_per_page;
		if ($end > $this->item_num_total) {
			$end = $this->item_num_total;
		}

		$current_page_products_range = [];
		$current_page_products_range['start'] = $start;
		$current_page_products_range['length'] = $end - $start + 1;
		return $current_page_products_range; 
	}

	public function paginationHTML() {
		$output = '<ul class="pagination">';
		$i = 0;
		while ($i < $this->total_pages) {
			$i += 1;
			if ($i == $this->current_page) {
				$output .= '<li class="active"><span>' . $i . '</span></li>';
			} else  {
				$output .= '<li><a href="' . BASE_URL . '?pg=' . $i . '&page=shop">' . $i . '</a></li>';
			}
		}
		$output .= '</ul>';
		return $output;
	}
}


