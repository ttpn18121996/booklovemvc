<?php 
if (isset($_GET['alias'])) {
	if ($_GET['alias'] == '1') {
		$title = "nhân viên";
	} else {
		$title = "khách hàng";
	}
	
} else {
	$title = "tất cả người dùng";
}

 ?>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-user" aria-hidden="true"></i> Danh sách <?php echo $title ?></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a href="<?php Autoload::URL('admin/adminuser/add') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Thêm người dùng</a>
					</li>
				</ul>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th class="text-center">Tên / Hình</th>
							<th class="text-center">Email</th>
							<th class="text-center">Điện thoại</th>
							<th class="text-center">Địa chỉ</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center"><i class="fa fa-wrench"></i> Thao Tác</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $item): ?>
						<tr>
							<th scope="row"><?php echo $item->id ?></th>
							<td class="text-center" style="width: 20%;">
								<?php if ($item->picture != null): ?>
									<img src="<?php Autoload::URL('imgs/'.$item->picture) ?>" alt="" height="80">
								<?php else: ?>
									<img src="<?php Autoload::URL('imgs/user.png') ?>" alt="" height="80">
								<?php endif ?>
								<p><a href="<?php Autoload::URL('admin/adminuser/getUpdate/'.$item->id.'/'.$item->role_id) ?>" class="text-primary"><?php echo $item->last_name." ".$item->first_name ?></a></p>
							</td>
							<td class="text-center"><?php echo $item->email ?></td>
							<td class="text-center"><?php echo $item->phone ?></td>
							<td class="text-center"><?php echo $item->address ?></td>
							<?php if ($item->status == 0) { ?>
								<td class="text-center">
									<i class="fa fa-toggle-off text-danger update-stt" url="<?php Autoload::URL('admin/adminuser/updatestt') ?>" aria-hidden="true"></i>
								</td>
							<?php } else { ?>
								<td class="text-center">
									<i class="fa fa-toggle-on text-success update-stt" url="<?php Autoload::URL('admin/adminuser/updatestt') ?>" aria-hidden="true"></i>
								</td>
							<?php } ?>
							<td class="text-center">
								<a href="<?php Autoload::URL('admin/adminuser/update/'.$item->id) ?>" class="text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
								&nbsp;&nbsp;&nbsp;
								<a class="text-danger delete" id="<?php echo $item->id ?>" url="<?php Autoload::URL('admin/adminuser/delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
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