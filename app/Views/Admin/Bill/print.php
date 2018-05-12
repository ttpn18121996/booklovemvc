<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
            <div class="x_title">
                <h2>Thông tin khách hàng / Cập nhật: <?php echo date("d/m/Y", strtotime($data->updated)) ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="print_content">
                <br />
                <div class="row">
                	<div class="col-xs-6">
	                	<p><label>Họ và tên: <?php echo $data->full_name ?></label></p>
	                	<p><label>Email: <?php echo $data->email ?></label></p>
	                	<p><label>Điện thoại: <?php echo $data->phone ?></label></p>
	                	<p><label>Địa chỉ: <?php echo $data->address ?></label></p>
	                </div>
	                <div class="col-xs-6">
	                	<p><label>Tổng giá hoá đơn: <?php echo number_format($data->total)."VNĐ" ?></label></p>
	                	<p><label>Ngày đặt: <?php echo date("d/m/Y", strtotime($data->created)) ?></label></p>
	                	<p><label>Thời gian dự kiến giao hàng: <?php echo date("d/m/Y", (strtotime($data->created)+5*24*3600)) ?></label></p>
	                	<p><label>Ghi chú: <?php echo $data->note ?></label></p>
	                </div>
                </div>
                <div class="row">
                	<div class="col-xs-12">
                		<table class="table table-striped">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th class="text-center">ID Sản phẩm</th>
		                            <th class="text-center">Tên sản phẩm</th>
		                            <th class="text-center">Số lượng</th>
		                            <th class="text-center">Đơn giá</th>
		                            <th class="text-center">Thành tiền</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <?php foreach ($bill_detail as $item): ?>
		                        <tr>
		                            <th scope="row"><?php echo $item->id ?></td>
		                            <td class="text-center"><?php echo $item->id_product ?></td>
		                            <td class="text-center"><p><?php echo $item->name_product ?></p></td>
		                            <td class="text-center"><?php echo $item->quantity ?></td>
		                            <td class="text-center"><?php echo number_format($item->real_price)." VNĐ" ?></td>
		                            <td class="text-center"><?php echo number_format($item->total)." VNĐ" ?></td>
		                        </tr>
		                        <?php endforeach ?>
		                    </tbody>
		                </table>
                	</div>
                </div>
                <div class="row">
	            	<div class="col-xs-5 col-xs-offset-1">
	            		<label>Người giao hàng</label>
	            	</div>
	            	<div class="col-xs-5 text-right">
	            		<label>Người nhận</label>
	            	</div>
	            </div>
	            
            </div>

            <div class="x_footer">
            	<div class="col-xs-4 col-xs-offset-4">
            		<button type="button" class="btn btn-primary print"><i class="fa fa-print" aria-hidden="true"></i> In hoá đơn</button>
            		<button class="btn btn-danger" type="button" id="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
            	</div>
                <div class="clearfix"></div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript" src="<?php Autoload::URL('js/jQuery.print.js') ?>"></script>
<script type="text/javascript">
	$(function() {
		$(".print").click(function() {   
	    	$("#print_content").print({
	    		globalStyles : true,
	    	});
		});
	});
</script>