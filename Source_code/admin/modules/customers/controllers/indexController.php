<?php
function construct() {
	load_model('index');

}

function listAction() {

	$data_tmp =  getAll();
	//phan trang
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
	 load_view('index',$data);
}

function addAction() {
	$fullname;
	$username;
	$password;
	$mail;
	$phone;
	$address;
	$err = array();
	if(!empty($_POST['btn_submit'])){
		if(!empty($_POST['fullname'])){
			$fullname = $_POST['fullname'];
		}else{
			$err['fullname'] ="Tên khách hàng không được rỗng";		
		}
		if(!empty($_POST['username'])){
			$username = $_POST['username'];
		}else{
			$err['username'] ="username không được rỗng";		
		}
		if(!empty($_POST['password'])){
			$password = $_POST['password'];
		}else{
			$err['password'] ="password không được rỗng";		
		}
		if(!empty($_POST['mail'])){
			$mail = $_POST['mail'];
		}else{
			$err['mail'] ="Email không được rỗng";		
		}

		if(!empty($_POST['phone'])){
			$phone = $_POST['phone'];
		}else{
			$err['phone'] ="Số điện thoại không được rỗng nha fen";		
		}

		if(!empty($_POST['address'])){
			$address = $_POST['address'];
		}else{
			$err['address'] ="Địa chỉ không được rỗng";		
		}
		if(empty($err)){
			$create_date = date("d/m/Y",time());
			$data = [
				'fullname' =>$fullname,
				'username' =>$username,
				'password' =>$password,
				'mail' =>$mail,
				'phone' =>$phone,
				'address' =>$address,
				'create_date' =>$create_date,
			];
				if(insert_customer($data)){
					
					echo " <script type='text/javascript'> alert('Thêm mới thành công');</script>";
				}else{
					
					echo " <script type='text/javascript'> alert('Thêm mới khách hàng thất bại');</script>";
				}
	
		}
		else{
				
				echo " <script type='text/javascript'> alert('Thêm mới khách hàngs thất bại');</script>";
			}
	
	}
	load_view('add');

}

function deleteAction() {
	$id = $_GET['id'];
	delete_customer_by_id($id);
	header('location:?modules=customers&controllers=index&action=list');
}

?>