<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-signin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php Autoload::URL('user/signin') ?>" method="POST" id="frmSingin">
                <div class="modal-header myBackground">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel"><i class="glyphicon glyphicon-user"></i> Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mật khẩu:</label>
                                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mật khẩu đăng ký" required>
                            </div>
                            <a href="#" style="color: #23527c;">Bạn quên mật khẩu?</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="submit" class="btn btn-warning">Đăng nhập</button>
                </div>
                
            </form>
        </div>
    </div>
</div>