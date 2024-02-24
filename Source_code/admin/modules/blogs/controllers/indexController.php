<?php

function construct() {
	load_model('index');
}

function addAction() {

	$title;
	$user;
	$content;
	$create_date;
	$description;
	$image;
	$err = array();
	if(!empty($_POST['btn_submit'])){

		if(!empty($_POST['title'])){
			$title = $_POST['title'];
		}else{
			$err['title'] ="title không được rỗng";		
		}

		if(!empty($_POST['user'])){
			$user = $_POST['user'];
		}else{
			$err['user'] ="user không được rỗng";		
		}

		if(!empty($_POST['content'])){
			$content = $_POST['content'];
		}else{
			$err['content'] ="content không được rỗng";		
		}

		if(!empty($_POST['description'])){
			$description = $_POST['description'];
		}else{
			$err['description'] ="description không được rỗng";		
		}

		// check ảnh
		$target_dir = "public/uploads/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$target_dir_web_uploads = "../public/uploads/";
			$target_file_web_uploads = $target_dir_web_uploads . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["image"]["tmp_name"]);
			  if($check !== false) {
			    $uploadOk = 1;
			  } else {
			    $uploadOk = 0;
			  }
			}

			if (file_exists($target_file)) {
			  $uploadOk = 0;
			}

			if ($_FILES["image"]["size"] > 200000000) {
			  $uploadOk = 0;
			}

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  $uploadOk = 0;
			}

			if ($uploadOk == 0) {
			} else {
			  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				if (copy($target_file, $target_file_web_uploads)) {
					$image = $target_dir. basename( $_FILES["image"]["name"]);
				}
			  }
			}
			if(empty($image)){
				$err['image'] = "image không được rỗng";
			}

		if(empty($err)){
		$create_date = date("d/m/Y",time());
		$data = [
			'title' =>$title,
			'content' =>$content,
			'user' =>$user,
			'create_date' =>$create_date,
			'description' => $description,
			'image' => $image
		];
			if(insert_blog($data)){
				
	        	echo " <script type='text/javascript'> alert('Thêm mới bài viết thành công');</script>";
			}else{
				
	        	echo " <script type='text/javascript'> alert('Thêm mới bài viết thất bại');</script>";
			}

		}
		else{
			
	        echo " <script type='text/javascript'> alert('Thêm mới bài viết thất bại');</script>";
		}

	}
	load_view('add');

}

function deleteAction() {
	$id = $_GET['id'];
	delete_blog_by_id($id);
	header('location:?modules=blogs&controllers=index&action=list');
}

function editAction() {
	$id = $_GET['id'];
	$data = get_blog_by_id($id);
	load_view('show',$data);
}

function listAction(){
	$data_tmp = getAll();
// phan trang
	$page;
	if(!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}
	
	$numProduct = count($data_tmp);
	$productOnPage = 5;
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

	$data = [$res, $num, $page];
	load_view('list',$data);
}

function updateAction() {
	$id = $_GET['id'];
	$image;
	$data = get_blog_by_id($id);
	$data1 = array();
	if(!empty($_POST['btn_submit'])){

		if(empty($_POST['title'])){
			$data1['title'] = $data[0]['title'];
		}else{
			$data1['title'] = $_POST['title'];
		}

		if(empty($_POST['id'])){
			$data1['id'] = $data[0]['id'];
		}else{
			$data1['id'] = $_POST['id'];
		}

		if(empty($_POST['user'])){
			$data1['user'] = $data[0]['user'];
		}else{
			$data1['user'] = $_POST['user'];
		}

		if(empty($_POST['create_date'])){
			$data1['create_date'] = $data[0]['create_date'];
		}else{
			$data1['create_date'] = $_POST['create_date'];
		}

		if(empty($_POST['description'])){
			$data1['description'] = $data[0]['description'];
		}else{
			$data1['description'] = $_POST['description'];
		}

		if(empty($_POST['content'])){
			$data1['content'] = $data[0]['content'];
		}else{
			$data1['content'] = $_POST['content'];
		}

		//// anh
		$target_dir = "public/uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image"]["tmp_name"]);
		  if($check !== false) {
		    $uploadOk = 1;
		  } else {
		    $uploadOk = 0;
		  }
		}

		if (file_exists($target_file)) {
		  $uploadOk = 0;
		}

		if ($_FILES["image"]["size"] > 200000000) {
		  $uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $uploadOk = 0;
		}

		if ($uploadOk == 0) {

		} else {
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		    $image = $target_dir. basename( $_FILES["image"]["name"]);
		  } else {
		  }
		}

		if(!empty($image)){
			$data1['image'] = $image;
		}else{
			$data1['image'] = $data[0]['image'];
		}



	}
	if(update_blog_by_id($id,$data1)){
		$res = get_blog_by_id($id);
		load_view('show',$res);
            echo " <script type='text/javascript'> alert('Cập Nhật Thành Công');</script>";
	}else{
			load_view('show',$data);
            echo " <script type='text/javascript'> alert('Cập Nhật Thất Bại');</script>";
	}

}