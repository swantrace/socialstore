<?php
function createCategoryList(){
	// 问题： 如何避免利用url注入有害代码
	$categories = array("Antiques", "Art", "Automotive", "Baby", "Books", "Business & Industrial",
		"Cameras & Photo", "Clothing & Accessories", "Computers", "Crafts", "DVD's & Movies",
		"Electronics", "Health & Beauty", "Home & Garden", "Jewelry & Watches", 
		"Pet Supplies", "Services", "Sports & Outdoors", "Sports Memorabilia & Cards", 
		"Tools & Home Improvement", "Toys & Hobbies", "Video Games", "Other", "");
	echo "<option>All Categories</option>";
	foreach($categories as $key => $category){
		if(isset($_GET['category']) AND $_GET['category'] == $key){
			echo "<option value=\"$key\" SELECTED>$category</option>";
		} else {
			echo "<option value=\"$key\">$category</option>";
		}
	}
}
?>