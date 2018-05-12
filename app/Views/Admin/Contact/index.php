<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">

				<h2><i class="fa fa-list" aria-hidden="true"></i> Danh sách liên hệ</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Trạng thái</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php Autoload::URL('admin/admincontact/index/da-xem') ?>">Đã xem</a>
							</li>
							<li><a href="<?php Autoload::URL('admin/admincontact/index/chua-xem') ?>">Chưa xem</a>
							</li>
						</ul>
					</li>
				</ul>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th class="text-center">Họ và tên</th>
							<th class="text-center">Email</th>
							<th class="text-center">Điện thoại</th>
							<th class="text-center">Ngày gửi</th>
							<th class="text-center">Ngày xem</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center"><i class="fa fa-wrench"></i> Thao Tác</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $item): ?>
						<tr>
							<th scope="row"><?php echo $item->id ?></th>
							<td class="text-center">
								<p><a href="#" class="text-primary"><?php echo $item->full_name ?></a></p>
							</td>
							<td class="text-center"><?php echo $item->email ?></td>
							<td class="text-center"><?php echo $item->phone ?></td>
							<td class="text-center"><?php echo date("d/m/Y H:i:s", $item->created) ?></td>
							<td class="text-center"><?php echo date("d/m/Y H:i:s", $item->updated) ?></td>
							<?php if ($item->status == 0) { ?>
								<td class="text-center">
									<i class="fa fa-toggle-off text-danger" aria-hidden="true"></i>
								</td>
							<?php } else { ?>
								<td class="text-center">
									<i class="fa fa-toggle-on text-success" aria-hidden="true"></i>
								</td>
							<?php } ?>
							<td class="text-center">
								<a href="<?php Autoload::URL('admin/admincontact/detail/'.$item->id) ?>" class="text-primary"><i class="fa fa-search" aria-hidden="true"></i> Xem</a>
								<?php if ($_SESSION['useradmin']->role_id == 0): ?>
									&nbsp;&nbsp;&nbsp;<a class="text-danger delete" id="<?php echo $item->id ?>" url="<?php Autoload::URL('admin/admincontact/delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
								<?php endif ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php Autoload::Paging() ?>
<script type="text/javascript" src="<?php Autoload::URL('js/admin/ajaxAdmin.js') ?>"></script>