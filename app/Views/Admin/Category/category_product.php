<?php 
	$cat_name = isset($_GET['a']) ? str_replace("_product", "", $_GET['a']) : "";
	if ($cat_name == "category") {
		$name = "thể loại";
		$as = "san-pham";
	} elseif ($cat_name == "author") {
		$name = "tác giả";
		$as = "tac-gia";
	} elseif ($cat_name == "producer") {
		$name = "nhà xuất bản";
		$as = "nxb";
	} else {
		$name = "danh mục";
		$as = "";
	}
 ?>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">

				<h2><i class="fa fa-list" aria-hidden="true"></i> Danh sách <?php echo $name ?></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a href="<?php Autoload::URL('admin/admincategory/getAdd/'.$as) ?>"><i class="fa fa-plus" aria-hidden="true"></i> Thêm <?php echo $name ?></a>
					</li>
				</ul>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th class="text-center">Tên</th>
							<th class="text-center">Tên định danh</th>
							<th class="text-center">Module</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center"><i class="fa fa-wrench"></i> Thao Tác</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $item): ?>
						<tr>
							<th scope="row"><?php echo $item->id ?></th>
							<td class="text-center">
								<p><a href="#" class="text-primary"><?php echo $item->name ?></a></p>
							</td>
							<td class="text-center"><?php echo $item->alias ?></td>
							<td class="text-center"><?php echo $item->module ?></td>
							<?php if ($item->status == 0) { ?>
								<td class="text-center">
									<i class="fa fa-toggle-off text-danger update-stt" url="<?php Autoload::URL('admin/admincategory/updatestt') ?>" aria-hidden="true"></i>
								</td>
							<?php } else { ?>
								<td class="text-center">
									<i class="fa fa-toggle-on text-success update-stt" url="<?php Autoload::URL('admin/admincategory/updatestt') ?>" aria-hidden="true"></i>
								</td>
							<?php } ?>
							<td class="text-center">
								<a href="<?php Autoload::URL('admin/admincategory/getUpdate/'.$item->alias.'/'.$item->id) ?>" class="text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
								&nbsp;&nbsp;&nbsp;
								<a class="text-danger delete" id="<?php echo $item->id ?>" url="<?php Autoload::URL('admin/admincategory/delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
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