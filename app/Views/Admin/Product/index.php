<?php 
	include_once "$app_path/$model_path/Category.php";
	$catModel = new Category;
 ?>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-product-hunt" aria-hidden="true"></i> Danh sách sản phẩm</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Thể loại</a>
						<ul class="dropdown-menu" role="menu">
							<?php foreach($cat as $item): ?>
							<li><a href="<?php Autoload::URL('admin/adminproduct/index/san-pham/'.$item->id) ?>"><?php echo $item->name ?></a>
							</li>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Tác giả</a>
						<ul class="dropdown-menu" role="menu">
							<?php foreach($aut as $item): ?>
							<li><a href="<?php Autoload::URL('admin/adminproduct/index/tac-gia/'.$item->id) ?>"><?php echo $item->name ?></a>
							</li>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Nhà xuất bản</a>
						<ul class="dropdown-menu" role="menu">
							<?php foreach($prc as $item): ?>
							<li><a href="<?php Autoload::URL('admin/adminproduct/index/nxb/'.$item->id) ?>"><?php echo $item->name ?></a>
							</li>
							<?php endforeach ?>
						</ul>
					</li>
					<li><a href="<?php Autoload::URL('admin/adminproduct/getAdd') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm</a>
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
							<th class="text-center">Thể loại</th>
							<th class="text-center">Tác giả</th>
							<th class="text-center">NXB</th>
							<th class="text-center">Giá</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center"><i class="fa fa-wrench"></i> Thao Tác</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $item): ?>
						<tr>
							<th scope="row"><?php echo $item->id ?></th>
							<td class="text-center" style="width: 30%;">
								<img src="<?php Autoload::URL('imgs/products/'.$item->picture) ?>" alt="" height="80">
								<p><a href="<?php Autoload::URL('admin/adminproduct/getUpdate/'.$item->alias.'/'.$item->id) ?>" class="text-primary"><?php echo $item->name ?></a></p>
							</td>
							<?php 
								$cat = $catModel->where("id", $item->category_id1)->where("module", "san-pham")->getArray();
								$aut = $catModel->where("id", $item->category_id2)->where("module", "tac-gia")->getArray();
								$pro = $catModel->where("id", $item->category_id3)->where("module", "nxb")->getArray();
								if ($cat == null) {
									$cat = array(0 => array('name' => ''));
								}
								if ($aut == null) {
									$aut = array(0 => array('name' => ''));
								}
								if ($pro == null) {
									$pro = array(0 => array('name' => ''));
								}
							 ?>
							<td class="text-center"><?php echo $cat[0]['name'] ?></td>
							<td class="text-center"><?php echo $aut[0]['name'] ?></td>
							<td class="text-center"><?php echo $pro[0]['name'] ?></td>
							<td class="text-center"><?php echo number_format($item->real_price)." ".$item->currency ?></td>
							<?php if ($item->status == 0) { ?>
								<td class="text-center">
									<i class="fa fa-toggle-off text-danger update-stt" url="<?php Autoload::URL('admin/adminproduct/updatestt') ?>" aria-hidden="true"></i>
								</td>
							<?php } else { ?>
								<td class="text-center">
									<i class="fa fa-toggle-on text-success update-stt" url="<?php Autoload::URL('admin/adminproduct/updatestt') ?>" aria-hidden="true"></i>
								</td>
							<?php } ?>
							<td class="text-center">
								<a href="<?php Autoload::URL('admin/adminproduct/getUpdate/'.$item->alias.'/'.$item->id) ?>" class="text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
								&nbsp;&nbsp;&nbsp;
								<a class="text-danger delete" id="<?php echo $item->id ?>" url="<?php Autoload::URL('admin/adminproduct/delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
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