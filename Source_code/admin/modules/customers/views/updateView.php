<?php get_header(); ?>

<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="?modules=customers&controller=index&action=update">
                        <?php if(!empty($data)) foreach ($data as  $value) {?>

                            <label for="display-name">Tên hiển thị</label>
                            <input type="text" style="width:50%;" name="fullname" id="display-name" value="<?php echo $value['fullname']; ?>">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" style="width:50%;" name="username" id="username"  readonly="readonly" value="<?php echo $value['username']; ?>">
                            <label for="mail">Email</label>
                            <input type="mail" style="width:50%;" name="mail" id="mail" value="<?php echo $value['mail']; ?>">
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" style="width:50%;" name="phone" id="tel" value="<?php echo $value['phone']; ?>">
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" style="width:50%;" id="address"><?php echo $value['address']; ?></textarea>

                        <?php }; ?>

                        <button type="submit" name="btn_submit" id="btn-submit">Cập nhật</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>