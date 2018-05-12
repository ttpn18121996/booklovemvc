<?php 
    if (isset($_GET['alias'])) {
        $action_form = Autoload::URL('admin/adminuser/update/'.$_GET['alias'], 'return');
    } else {
        $action_form = Autoload::URL('admin/adminuser/add', 'return');
    }
 ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tài khoản</h2>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="frmReq" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php echo $action_form ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Tên đăng nhập</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="username" id="username" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data->username ?>">
                        </div>
                    </div>
                    <?php if (empty($_GET['alias'])) { ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Mật khẩu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="password" id="password" class="form-control col-md-7 col-xs-12 required">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cấp tài khoản</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="role_id" class="form-control">
                                <option value="2" <?php if($data->role_id == 2) echo 'selected' ?>>Khách hàng</option>
                                <option value="1" <?php if($data->role_id == 1) echo 'selected' ?>>Nhân viên</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Họ và tên</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" name="last_name" id="last_name" class="form-control col-md-7 col-xs-12 required" placeholder="Họ" value="<?php echo $data->last_name ?>">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" name="first_name" id="first_name" class="form-control col-md-7 col-xs-12 required" placeholder="Tên" value="<?php echo $data->first_name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">Ảnh đại diện</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if ($data->picture != "") { ?>
                            <img src="<?php Autoload::URL('imgs/'.$data->picture) ?>" alt="picture" height="300">
                            <?php } else { ?>
                            <img src="<?php Autoload::URL('imgs/user.png') ?>" alt="picture" height="100">
                            <?php } ?>
                            <input type="file" name="picture" class="form-control">
                            <input type="hidden" name="currentpicture" value="<?php echo $data->picture ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" id="email" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data->email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Điện thoại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="phone" id="phone" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data->phone ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Địa chỉ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="address" id="address" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data->address ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
                            <label class="radio-inline"><input type="radio" name="status" value="0" <?php if ($data->status == "0") echo 'checked'; ?>>Ẩn</label>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin</button>
                            <button class="btn btn-danger" type="button" id="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-back").click(function() {
            window.history.back();
        });
    });
</script>
<script type="text/javascript" src="<?php Autoload::URL('js/admin/ajaxAdmin.js') ?>"></script>