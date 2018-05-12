<div class="container">
	<div class="row">
		<?php include 'app/Views/Shared/left.php' ?>
		<div class="col-md-9">
			<div class="row title text-center">
				<h3>Thông tin tài khoản</h3>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-xs-12">
					<form action="<?php Autoload::URL('user') ?>" method="POST">
						<div class="form-group">
                            <label>Họ và tên:</label>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" name="lastname" class="form-control" placeholder="Họ" required maxlength="50" value="<?php echo $_SESSION['userclient']->last_name ?>">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" name="firstname" class="form-control" placeholder="Tên" required maxlength="50" value="<?php echo $_SESSION['userclient']->first_name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email1" placeholder="email@example.com" required minlength="10" autocomplete="false" value="<?php echo $_SESSION['userclient']->email ?>" readonly disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Điện thoại:</label>
                            <input type="text" name="phone" class="form-control required digits" id="phone" placeholder="0123456789" value="<?php echo $_SESSION['userclient']->phone ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Địa chỉ:</label>
                            <input type="text" name="address" class="form-control required" id="address" value="<?php echo $_SESSION['userclient']->address ?>">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalChangePassword">Đổi mật khẩu</button>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Cập nhật</button>
                            <button type="button" class="btn btn-danger" id="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>