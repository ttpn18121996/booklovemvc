<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-signup">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php Autoload::URL('user/signup') ?>" method="POST" id="frmSignup">
                <input type="hidden" url="<?php Autoload::URL("user/checkmail") ?>" id="hidden">
                <div class="modal-header myBackground">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel"><i class="glyphicon glyphicon-user"></i> Đăng ký</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email1" placeholder="email@example.com" required minlength="10" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mật khẩu:</label>
                                <input type="password" name="pwd" class="form-control" id="pwd1" placeholder="Mật khẩu để đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Nhập lại mật khẩu:</label>
                                <input type="password" name="cpwd1" class="form-control" id="cpwd1" placeholder="Nhập lại mật khẩu đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <label>Họ và tên:</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" name="lastname" class="form-control" placeholder="Họ" required maxlength="50">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" name="firstname" class="form-control" placeholder="Tên" required maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Điện thoại:</label>
                                <input type="text" name="phone" class="form-control required digits" id="phone" placeholder="0123456789">
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ:</label>
                                <input type="text" name="address" class="form-control required" id="address">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="submit" class="btn btn-warning">Tạo tài khoản</button>
                </div>
            </form>
        </div>
    </div>
</div>