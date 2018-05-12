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
							<th>Thao tác</th>
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
									<div class="value-minus update"><i class="fa fa-minus"></i></div>
									<div class="value" id="<?php echo $item['id'] ?>"><?php echo $item['quantity'] ?></div>
									<div class="value-plus update"><i class="fa fa-plus"></i></div>
								</div>
							</td>
							<td class="price"><?php echo number_format($item['real_price']*$item['quantity']).$item['currency'] ?></td>
							<td><button type="button" class="btn btn-warning delete" id="<?php echo $item['id'] ?>"><i class="fa fa-times"></i></button></td>
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2"><h4 class="text-danger">Tổng tiền: <?php echo number_format(Cart::TotalBill())." VNĐ" ?></h4></td>
							<td colspan="3">
								<a href="<?php Autoload::URL('cart/deleteAll') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Xoá giỏ hàng</a>
								<a href="<?php Autoload::URL('cart/getPay') ?>" class="btn btn-warning"><i class="fa fa-usd"></i> Thanh toán giỏ hàng</a>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".value-plus").on('click', function(event) {
		var newupd = $(this).parent().find('.value'), newvalue = parseInt(newupd.text(), 10)+1;
		if(newvalue <= 5)newupd.text(newvalue);
	});
	$(".value-minus").on('click', function(event) {
		var newupd = $(this).parent().find('.value'), newvalue = parseInt(newupd.text(), 10)-1;
		if(newvalue >= 1) newupd.text(newvalue);
	});
</script>
<script type="text/javascript" src="<?php Autoload::URL('js/ajaxCart.js') ?>"></script>