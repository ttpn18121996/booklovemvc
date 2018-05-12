<div class="container">
	<div class="row">
		<?php include 'app/Views/Shared/left.php' ?>
		<div class="col-md-9">
			<div class="row title text-center">
				<h3>Liên hệ</h3>
			</div>
			<div class="row mg-top-20">
				<div class="col-sm-8 col-sm-offset-2">
					<form action="<?php Autoload::URL('home/contact') ?>" method="POST">
						<div class="form-group">
							<label for="full_name">Họ và tên:</label>
							<input type="text" name="full_name" class="form-control required" id="full_name" maxlength="50" autocomplete="false" placeholder="Nhập đầy đủ họ tên" value="<?php if(isset($_SESSION['userclient'])) echo $data->last_name.' '.$data->first_name ?>">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" name="email" class="form-control required" id="email" minlength="10" autocomplete="false" placeholder="example@example.com" value="<?php echo $data->email ?>">
						</div>
						<div class="form-group">
							<label for="phone">Điện thoại:</label>
							<input type="text" name="phone" class="form-control required digits" id="phone" minlength="10" autocomplete="false" placeholder="0123456789" value="<?php echo $data->phone ?>">
						</div>
						<div class="form-group">
							<label for="note">Nội dung</label>
							<textarea name="note" id="note" class="form-control" rows="3"></textarea>
						</div>
						<button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i> Gửi thông tin</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>