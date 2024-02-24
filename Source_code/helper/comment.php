<?php 
    function insert_comment($id, $comment, $datetime){

        $data = [
            'id_custom' => $id,
            'username' => $_SESSION['username'],
            'message_content' => $comment,
            'create_date' => $datetime
            ];

        return db_insert("tbl_comment", $data);
    }
    function create_comment_product() {
        $id = 1;
        $custom_id = "product_".$id;
        $date_time = time();
        $comment;
        $err = array();
        if (!empty($_POST['btn_comment_submit'])) {
                
            if (!empty($_POST['comment'])) {
                $comment = $_POST['comment'];
            }else{
                $err['comment'] = "comment không được để rỗng";
            }
    
            
            if(empty($err)){
                // Check xem đã login chưa
                insert_comment($custom_id, $comment, $date_time);

                // if(checkLogin($username, $password)){
    
                //     $dataUser = getUser($username, $password);
                //     $_SESSION['id_customer'] = $dataUser['id'];
                //     $_SESSION['username'] = $dataUser['username'];
                //     $_SESSION['fullname'] = $dataUser['fullname'];
                //     header('location:?modules=home');
                // }else{
    
                //     echo " <script type='text/javascript'> alert('Thông tin tải khoản không đúng!!!');</script>";
                // }
            }else{
    
                echo " <script type='text/javascript'> alert('Không thể để trống nội dung phần comment');</script>";
            }
    
        }
        load_view('index');
    }

?>