<?php

function construct()
{
    load_model('index');
}

function listAction()
{
    
    $data_tmp = getAllComment();
    // phan trang
    $page;
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $numProduct = count($data_tmp);
    $productOnPage = 5;
    $num = ceil($numProduct / $productOnPage);
    if (!empty($_GET['page']) && $_GET['page'] > $num) {
        $page = $num;
    }
    $start = ($page - 1) * $productOnPage;
    $res = [];
    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }
    ;

    $data = [$res, $num, $page];
    load_view('list', $data);
}

function deleteAction() {
	$id = $_GET['id'];
	deleteCommentByID($id);
	header('location:?modules=comment&controllers=index&action=list');
}

?>