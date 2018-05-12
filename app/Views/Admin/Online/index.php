<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-signal" aria-hidden="true"></i> Danh sách online</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a>Tổng cộng: <?php echo $total ?> lượt truy cập</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th class="text-center">ID Online</th>
							<th class="text-center">Thời Gian</th>
							<th class="text-center">IP</th>
							<th class="text-center">Tên</th>
							<?php if ($_SESSION['useradmin'] == 0): ?>
								<th class="text-center"><i class="fa fa-wrench"></i> Thao Tác</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $item): ?>
						<tr>
							<th scope="row"><?php echo $item->id ?></th>
							<td class="text-center"><?php echo $item->id_online ?></td>
							<td class="text-center"><?php echo date("d/m/Y H:i:s", $item->time) ?></td>
							<td class="text-center"><?php echo $item->ip ?></td>
							<td class="text-center"><?php echo $item->name ?></td>
							<?php if ($_SESSION['useradmin'] == 0): ?>
								<td class="text-center">
									<a class="text-danger delete" id="" url="delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
								</td>
							<?php endif ?>
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