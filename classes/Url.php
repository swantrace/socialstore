<?php  
class Url {
	public static $page = "page";
	public static $folder = PAGES_DIR;
	public static $params = array();

	public static function getParameter($par){
		return isset($_GET[$par]) && $_GET[$par] != ""? $_GET[$par]:null;

	}

	public static function getCurrentPageName() {
		return isset($_GET[self::$page])? $_GET[self::$page]:'index';
	}

	public static function getCurrentPageFile() {
		$page = self::$folder . DS . self::getCurrentPageName() . ".php";
		if (!is_file($page)) {
			$page = self::$folder . DS . "404.php";
		}
		return $page;
	}

	public static function getAllParameters(){
		if (!empty($_GET)) {
			foreach ($_GET as $key => $value) {
				if (!empty($value)) {
					self::$params[$key] = $value;
				}
			}
		}
	}
}



?>