<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-cog" aria-hidden="true"></i> <span>Quản lý hệ thống</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php Autoload::URL('imgs/'.$_SESSION['useradmin']->picture) ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Xin chào,</span>
                <h2><?php echo $_SESSION['useradmin']->first_name ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Danh sách quản lý</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Trang chủ <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php Autoload::URL('admin') ?>">Admin</a></li>
                            <li><a href="<?php Autoload::URL('admin/admin/about') ?>">Giới thiệu</a></li>
                            <li><a href="<?php Autoload::URL('home/index') ?>" target="_blank">Xem website</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-product-hunt" aria-hidden="true"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php Autoload::URL('admin/admincategory/category_product') ?>">Thể loại</a></li>
                            <li><a href="<?php Autoload::URL('admin/admincategory/author_product') ?>">Tác giả</a></li>
                            <li><a href="<?php Autoload::URL('admin/admincategory/producer_product') ?>">Nhà xuất bản</a></li>
                            <li><a href="<?php Autoload::URL('admin/adminproduct') ?>">Sản phẩm</a></li>
                            <li><a href="<?php Autoload::URL('admin/adminproduct/getAdd') ?>">Thêm sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-picture-o" aria-hidden="true"></i> Quản lý hình ảnh <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php Autoload::URL('admin/adminpicture') ?>">Hình ảnh website</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-th-list" aria-hidden="true"></i> Quản lý đơn hàng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php Autoload::URL('admin/adminbill') ?>">Danh sách đơn hàng</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-phone" aria-hidden="true"></i> Quản lý liên hệ <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Thông tin liên hệ</a></li>
                            <li><a href="<?php Autoload::URL('admin/admincontact') ?>">Liên hệ từ khách hàng</a></li>
                            <li><a href="<?php Autoload::URL('admin/admincontact/signUpForTheNewsletter') ?>">Đăng kí nhận tin</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-globe" aria-hidden="true"></i> Quản lý website <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php Autoload::URL('admin/admininfo') ?>">Thông tin chung</a></li>
                            <li><a href="<?php Autoload::URL('admin/adminonline') ?>">Thông tin online</a></li>
                        </ul>
                    </li>
                    <?php if ($_SESSION['useradmin']->role_id == 0): ?>
                    <li><a><i class="fa fa-user-o" aria-hidden="true"></i> Quản lý tài khoản <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php Autoload::URL('admin/adminuser') ?>">Tất cả</a></li>
                            <li><a href="<?php Autoload::URL('admin/adminuser/index/1') ?>">Nhân viên</a></li>
                            <li><a href="<?php Autoload::URL('admin/adminuser/index/2') ?>">Khách hàng</a></li>
                        </ul>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>