<?php 

function insert_customer($data){

	return db_insert("tbl_customer", $data);
}

function getAll() {

	return db_fetch_array("SELECT * FROM `tbl_customer`");
}
function delete_customer_by_id($id){

	return db_delete("tbl_customer", "`id` = '$id'");
	return db_delete("tbl_order", "`id` = '$id'");
	
}

function get_customer_by_id($id){

	return db_fetch_array("SELECT * FROM `tbl_customer` WHERE `id` = '$id'");
}
function update_customer_by_id($id,$data){

	return db_update("tbl_customer", $data, "`id`='$id'");
}
 ?>