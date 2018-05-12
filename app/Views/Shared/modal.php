<!-- Add Cart Success -->
<div class="modal fade bs-example-modal-sm" role="dialog" aria-labelledby="mySmallModalLabel" id="modalCart">
  	<div class="modal-dialog modal-sm" role="document">
    	<div class="modal-content">
      		<div class="modal-header myBackground">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="gridSystemModalLabel"><i class="fa fa-check"></i> Thêm thành công</h4>
		    </div>
		    <div class="modal-body text-center">
		    	<b>Sản phẩm đã được thêm vào giỏ hàng!</b>
		    	<b>Bạn có muốn tiếp tục?</b>
		    </div>
		    <div class="modal-footer">
		    	<button type="button" class="btn btn-primary" data-dismiss="modal">Tiếp tục</button>
        		<a href="<?php Autoload::URL('cart') ?>" class="btn btn-warning">Đến giỏ hàng</a>
		    </div>
    	</div>
  	</div>
</div>
<!-- End Add Cart Success -->

<!-- Change Password -->
<div class="modal fade bs-example-modal-sm" role="dialog" aria-labelledby="mySmallModalLabel" id="modalChangePassword">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php Autoload::URL('user/forgotpassword') ?>" method="POST" id="frmChange">
				<div class="modal-header myBackground">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel"><i class="glyphicon glyphicon-user"></i> Đổi mật khẩu</h4>
                </div>
                <div class="modal-body">
                	<div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="email2">Email:</label>
                                <input type="email" name="email2" class="form-control" id="email2" placeholder="email@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Mật khẩu hiện tại:</label>
                                <input type="password" name="pass" class="form-control" id="pass" placeholder="Mật khẩu hiện tại" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd2">Mật khẩu mới:</label>
                                <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Mật khẩu mới" required>
                            </div>
                            <div class="form-group">
                                <label for="cpwd2">Nhập lại mật khẩu mới:</label>
                                <input type="password" name="cpwd2" class="form-control" id="cpwd1" placeholder="Nhập lại mật khẩu mới" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="submit" class="btn btn-warning">Đổi mật khẩu</button>
                </div>
			</form>
		</div>
	</div>
</div>
<!-- End Change Password -->