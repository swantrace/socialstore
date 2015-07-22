<?php
class Core{
	public function run() {
		ob_start();
		require_once(Url::getCurrentPageFile());
		ob_get_flush(); 
	}	
}

