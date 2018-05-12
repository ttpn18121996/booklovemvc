<?php 
if (isset($_SESSION['userclient'])) {
	$full_name = $_SESSION['userclient']->last_name." ".$_SESSION['userclient']->first_name;
	$email = $_SESSION['userclient']->email;
	$phone = $_SESSION['userclient']->phone;
	$address = $_SESSION['userclient']->address;
}
 ?>
<div class="container">
	<div class="row">
		<?php include 'app/Views/Shared/left.php' ?>
		<div class="col-md-9">
			<div class="row title text-center">
				<h3>Thông tin giỏ hàng</h3>
			</div>
			<div class="row mg-top-20">
				<table class="tb-format">
					<thead>
						<tr>
							<th>Hình / Tên</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($_SESSION['cart'] as $item) { ?>
						<tr>
							<td style="width: 30%;">
								<img src="<?php Autoload::URL('imgs/products/'.$item['picture']) ?>" alt="<?php echo $item['name'] ?>">
								<p><?php echo $item["name"] ?></p>
							</td>
							<td><?php echo number_format($item['real_price']).$item['currency'] ?></td>
							<td>
								<div class="quantity text-center">
									<div class="value"><?php echo $item['quantity'] ?></div>
								</div>
							</td>
							<td><?php echo number_format($item['real_price']*$item['quantity']).$item['currency'] ?></td>
							
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5"><h4 class="text-danger">Tổng tiền: <?php echo number_format(Cart::TotalBill())." VNĐ" ?></h4></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="row mg-top-20">
				<div class="col-sm-8 col-sm-offset-2 col-xs-12">
					<form class="form-horizontal" action="<?php Autoload::URL('cart/postPay') ?>" method="POST" id="frmPay">
						<div class="form-group">
							<label for="last_name" class="control-label col-sm-4">Họ và tên</label>
							<div class="col-sm-8">
								<input type="text" class="form-control required" id="full_name" name="full_name" value="<?php echo $full_name ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="control-label col-sm-4">Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control required" id="email" name="email" value="<?php echo $email ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="control-label col-sm-4">Điện thoại</label>
							<div class="col-sm-8">
								<input type="text" class="form-control required digits" id="phone" name="phone" value="<?php echo $phone ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="control-label col-sm-4">Địa chỉ</label>
							<div class="col-sm-8">
								<input type="text" class="form-control required" id="address" name="address" value="<?php echo $address ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="note" class="control-label col-sm-4">Ghi chú</label>
							<div class="col-sm-8">
								<textarea name="note" class="form-control" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-check"></i> Đặt hàng</button>
								<a href="<?php Autoload::URL('cart') ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Quay về giỏ hàng</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>