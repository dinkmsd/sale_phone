<?php

function construct() {

	load_model('index');

}



function indexAction() {

	load_view('index');
}




function addAction() {
	
}




function detailAction() {

	$id = $_GET['id'];
	$id_cat = getIDCatByIDProduct($id);
	$name = getNameCatById($id_cat);
	$same_cat = getProductById_cat($id_cat);
	$res = getProductById($id);

	$comment = getAllCommentByIDProduct($id);
	$len = count($comment);
	$i = 0;
	for ($i = 0; $i < $len; $i++) {
		if ($comment[$i]['refer'] != -1) {
			break;
		}
	}
	$tmp = $i;
	$i = 0;
	$comment_data = array();
	if ($len != 0) {
		while ($i < $len && $comment[$i]['refer'] == -1) {
			$comment_data[] = $comment[$i];
			for ($j = $tmp; $j < $len; $j++) {
				if ($comment[$j]['refer'] == $comment[$i]['id']) {
					$comment_data[] = $comment[$j];
				}
			}
			$i++;
		}
	}
	
	$data = [$name, $res, $same_cat, $comment_data];
	load_view('detail',$data);
}




function showAction(){
	
	$id_cat = $_GET['id_cat'];
	$name = getNameCatById($id_cat);
	$data_tmp = getAllByIDCat($id_cat);
	$id =$id_cat;
	$page;
	if(!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}
	
	$numProduct = count($data_tmp);
	$productOnPage = 8;
	$num = ceil($numProduct/$productOnPage);
	if(!empty($_GET['page']) && $_GET['page']>$num){
		$page =$num;
	}
	$start = ($page - 1) * $productOnPage;
	$res =[];
	for ($i=$start; $i < $start+$productOnPage; $i++) { 
		if(isset($data_tmp[$i]))
        $res[] = $data_tmp[$i];
	};

	$data = [$name, $res, $num, $id, $page];
	load_view('show',$data);
}

function addCommentAction() {
	if (isset($_POST['comment']) && !empty($_POST['comment'])) {
		$refer = -1;
		if (isset($_POST['refer'])) {
			$refer = $_POST['refer'];
		}
		$product_id = $_GET['id'];
		if (isset($_SESSION['is_login'])) {
			// $customer_id = 0;
		} else {
			$customer_id = $_SESSION['id_customer'];
		}
		$comment = $_POST['comment'];
		$create_date = date("d/m/Y",time());
		insertComment($product_id, $customer_id, $comment, $create_date, $refer);
		echo "<script>alert('Thêm bình luận thành công');
		window.location.href = '?modules=products&controllers=index&action=detail&id=$product_id#comment-section';
		</script>";
	} else {
		$product_id = $_GET['id'];
		echo "<script>alert('Không được để trống phần bình luận');
		window.location.href = '?modules=products&controllers=index&action=detail&id=$product_id#comment-section';
		</script>";
	}
}
