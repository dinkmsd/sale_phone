<?php 

function getProductById($id){
	
	return db_fetch_row("SELECT * FROM `tbl_product` WHERE `id`='$id'");
}

function getAllByIDCat($id){

	return db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category`='$id'");
}

function getNameCatById($id){

	return db_fetch_row("SELECT `name` FROM `tbl_category` WHERE `id`='$id'");
}

function getProductById_cat($id_cat){

	return db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category`='$id_cat'");
}

function getIDCatByIDProduct($id){

	$data = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id`='$id'");
	return $data['id_category'];
}

function getAllCommentByIDProduct($id) {
	return db_fetch_array("SELECT 
	`tbl_comment`.`id`, 
	`tbl_comment`.`comment`,
	`tbl_comment`.`refer`, 
	`tbl_customer`.`fullname`, 
	`tbl_comment`.`create_date` 
	FROM `tbl_comment` 
	LEFT JOIN `tbl_customer` 
	ON `tbl_customer`.`id` = `tbl_comment`.`customer_id` 
	WHERE `product_id`='$id' ORDER BY `refer` ASC, `tbl_comment`.`id` DESC");
}

function insertComment($product_id, $customer_id, $comment, $create_date, $refer) {
	$data = array(
		'product_id' => $product_id,
		'customer_id' => $customer_id,
		'comment' => $comment,
		'create_date' => $create_date,
		'refer' => $refer
	);

	return db_insert("tbl_comment", $data);
}

 ?>