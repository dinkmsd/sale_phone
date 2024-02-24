<?php get_header(); ?>

<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo ($data['0']['name']) ;?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img  src="<?php echo $data['1']['image']; ?>" />
                        </a>
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $data['1']['name']; ?></h3>
                        <div class="desc">
                            <p>Màn hình :<?php echo $data['1']['screen']; ?></p>
                            <p>Hệ điều hành :<?php echo $data['1']['operating_system']; ?></p>
                            <p>Camera sau :<?php echo $data['1']['rear_camera']; ?></p>
                            <p>Camera trước :<?php echo $data['1']['front_camera']; ?></p>
                            <p>CPU :<?php echo $data['1']['cpu'] ;?></p>
                            <p>RAM :<?php echo $data['1']['ram']; ?></p>
                            <p>Bộ nhớ :<?php echo $data['1']['memory'] ;?></p>     
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status" style="background-color: green; color: white; border-radius: 5px;"><?php echo $data['1']['status']; ?></span>
                        </div>
                        <p class="price"><?php echo $data['1']['promotional_price'].' .VNĐ' ;?></p>
                        <div id="num-order-wp">
                            <p style="display: inline-block; ">Số lượng : </p>
                            <input type="text" name="" style="width: 40px;text-align: center;" value="1">
                        </div>
                        <a href="<?php $id = $data['1']['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=add&id=$id" ;else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php  echo $data['1']['description']; ?>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php if(!empty($data['2'])) foreach ($data['2'] as  $value) {?>

                        <li>
                            <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="thumb">
                                <img src="<?php echo $value['image'] ;?>">
                            </a>
                            <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="product-name"><?php echo $value['name']; ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?php echo $value['promotional_price'].'.VND'; ?></span>
                                <span style="display: block;" class="old"><?php echo $value['price'].'.VND'; ?></span>
                            </div>
                            <div class="action clearfix">
                               <a href="<?php $id = $value['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=add&id=$id" ;else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php $id = $value['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=addByNow&id=$id"; else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        
                    <?php }; ?>

                    </ul>
                </div>
            </div>
            <div class="section comment-section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Bình luận</h3>
                </div>
                <form id="comment-section" action="<?php $id = $_GET['id']; if(!empty($_SESSION['id_customer']) || isset($_SESSION['is_login'])) $urlll ="?modules=products&action=addComment&id=$id" ;else $urlll ="?modules=users&controllers=index&action=index&report=2" ;echo $urlll;?>" method="POST">
                    <textarea class="form-control" rows="3" name="comment" placeholder="Mời bạn để lại bình luận"></textarea>
                    <button type="submit" class="send-comment-btn">GỬI BÌNH LUẬN</button>
                </form>
                <?php
                ?>
                <?php
                foreach ($data[3] as $value) {
                    $id = $_GET['id']; 
                    if(!empty($_SESSION['id_customer']) || isset($_SESSION['is_login'])) {
                        $urlll ="?modules=products&action=addComment&id=$id";
                    } else {
                        $urlll ="?modules=users&controllers=index&action=index&report=2";
                    }
                    if ($value['refer'] == -1) {
                ?>
                <div class="my-3 <?php if ($value['fullname'] == NULL) {
                            echo "admin-comment-field";
                        } else 
                            echo "comment-field"?>" id="comment-<?php echo $value['id'] ?>">
                    <div class="fw-bold"><?php if ($value['fullname'] == NULL) {
                            echo "Admin";
                        } else {
                            echo $value['fullname'];
                        }?></div>
                    <div><?php echo $value['create_date'] ?></div>
                    <div><?php echo $value['comment'] ?></div>
                    <div class="answer-small-btn" id="rep-btn-<?php echo $value['id'] ?>" onclick="display(this)">Trả lời</div>
                    <form class="w-50 ms-4" id="rep-comment-<?php echo $value['id'] ?>" action="<?php echo $urlll ?>" method="POST" style="display: none;">
                        <input type="hidden" name="refer" value="<?php echo $value['id'] ?>">
                        <textarea class="form-control" rows="3" name="comment" placeholder="Mời bạn để lại bình luận"></textarea>
                        <button type="submit" class="send-comment-btn">GỬI</button>
                    </form>
                </div>
                <?php
                    } else {
                ?>
                        <div class="my-3 ms-4 <?php if ($value['fullname'] == NULL) {
                            echo "admin-comment-field";
                        } else 
                            echo "comment-field"?>" id="comment-<?php echo $value['id'] ?>">
                        <div class="fw-bold"><?php if ($value['fullname'] == NULL) {
                            echo "Admin";
                        } else {
                            echo $value['fullname'];
                        }?></div>
                        <div><?php echo $value['create_date'] ?></div>
                        <div><?php echo $value['comment'] ?></div>
                        </div>
                <?php
                    }
                }
                ?>
                <script>
                    let start = <?php echo $data[3][0]['id'] - count($data[3]) + 1?>;
                    let end = <?php echo $data[3][0]['id'] + 1?>;
                    let display_comment_id = -1;
                    
                    function display(id) {
                        console.log(id);
                        let tmp = id.getAttribute('id');
                        let len = tmp.length;
                        rep_comment = document.getElementById("rep-comment-" + tmp.slice(8, len));
                        rep_comment.setAttribute("style", "display: block;");
                        if (display_comment_id != -1) {
                            rep_comment = document.getElementById("rep-comment-" + display_comment_id);
                            rep_comment.setAttribute("style", "display: none;");
                        }
                        display_comment_id = tmp.slice(8, len);
                    }
                </script>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>