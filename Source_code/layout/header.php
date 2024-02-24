<!DOCTYPE html>
<html>

<head>
    <title>SMART SHOP XL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="public/reset.css" rel="stylesheet" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="public/style.css" rel="stylesheet" />
    <link href="public/responsive.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="public/js/jquery-2.2.4.min.js"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="public/js/carousel/owl.carousel.js"></script>
    <script src="public/js/main.js"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">

                            <span class="ti-link"></span> Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="?modules=blogs&action=list" title="">
                                        <span class="ti-bookmark-alt"></span> Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="?modules=contacts&action=introduce" title="">
                                        <span class="ti-envelope"></span>
                                        Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="?modules=contacts&action=contact" title="">
                                        <span class="ti-headphone"></span>
                                        Liên hệ</a>
                                </li>

                                <li>
                                    <?php if (isset($_SESSION['is_login'])) {
                                    ?>
                                    <a href="admin" title="">
                                        <?php if (!empty($_SESSION['fullname'])) echo $_SESSION['fullname'];?>
                                    </a>
                                    <?php    
                                    } else {
                                    ?>
                                    <a href="?modules=users&action=index" title="">
                                        <?php if (!empty($_SESSION['fullname'])) echo $_SESSION['fullname'];
                                                                                        else echo "<span class=\"ti-user\">"."Tài khoản"."</span>"; ?>
                                    </a>
                                    <?php }; ?>
                                </li>
                                <?php if (!empty($_SESSION['fullname'])) { ?>
                                <li>
                                    <a href="?modules=users&action=logout" title="">(Đăng xuất)</a>
                                </li>
                                <?php }; ?>
                                <a style="display: inline;" href=""></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Bar search header -->
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="?modules=home" title="" id="logo" class="fl-left"><img
                                src="public/images/smart-mobi2.png" style="height: 60px; border-radius: 5px" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="post" action="?modules=search&controllers=index&action=search">
                                <input type="text" name="key_word" id="s" placeholder="Bạn muốn tìm gì...!">
                                <input type="submit" id="sm-s" name="btn_submit" value="Tìm kiếm">
                            </form>

                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">091.091.0910</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">
                                        <?php if (isset($_SESSION['cart']['buy']) && !empty($_SESSION['id_customer'])) echo $_SESSION['cart']['info']['num_oder'];
                                                    else echo '0'; ?>
                                    </span>
                                </div>
                                <div id="dropdown">
                                    <!-- giỏ hàng -->
                                    <p class="desc">Có <span>
                                            <?php if (isset($_SESSION['cart']['buy']) && !empty($_SESSION['id_customer'])) echo $_SESSION['cart']['info']['num_oder'];
                                                                else echo '0'; ?> sản phẩm
                                        </span> trong giỏ hàng</p>
                                    <ul class="list-cart">
                                        <?php if (isset($_SESSION['cart']['buy']) && !empty($_SESSION['id_customer'])) { ?>
                                        <?php foreach ($_SESSION['cart']['buy'] as $key => $value) { ?>
                                        <li class="clearfix">
                                            <a href="" title="" class="thumb fl-left">
                                                <img src="<?php echo $value['image']; ?>" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="" title="" class="product-name">
                                                    <?php echo $value['name']; ?>
                                                </a>
                                                <p class="price">
                                                    <?php echo $value['price'] . ' .VNĐ'; ?>
                                                </p>
                                                <p class="qty">Số lượng: <span>
                                                        <?php echo $value['qty']; ?>
                                                    </span></p>
                                            </div>
                                        </li>
                                        <?php }
                                        }; ?>
                                    </ul>
                                    <div class="total-price clearfix">
                                        <p class="title fl-left">Tổng:</p>
                                        <p class="price fl-right">
                                            <?php if (isset($_SESSION['cart']['buy']) && !empty($_SESSION['id_customer'])) echo $_SESSION['cart']['info']['total'] . " .VNĐ";
                                                                    else echo "0 .VNĐ"; ?>
                                        </p>
                                    </div>
                                    <dic class="action-cart clearfix">
                                        <a href="?modules=carts&action=show" title="Giỏ hàng"
                                            class="view-cart fl-left">Giỏ hàng</a>
                                        <a href="?modules=checkouts&action=index" title="Thanh toán"
                                            class="checkout fl-right">Thanh toán</a>
                                    </dic>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bar search header -->

            </div>