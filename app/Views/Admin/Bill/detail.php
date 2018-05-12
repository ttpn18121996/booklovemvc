<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin khách hàng / Cập nhật: <?php echo date("d/m/Y", strtotime($data->updated)) ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php Autoload::URL('admin/adminbill/print/'.$_GET['alias']) ?>"><i class="fa fa-print" aria-hidden="true"></i> In hoá đơn</a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="frmReq" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php Autoload::URL('admin/adminproduct/postAdd') ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">Họ và tên</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="full_name" class="form-control col-md-7 col-xs-12" value="<?php echo $data->full_name ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="email" class="form-control col-md-7 col-xs-12" value="<?php echo $data->email ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Điện thoại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="phone" class="form-control col-md-7 col-xs-12" value="<?php echo $data->phone ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Điạ chỉ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" class="form-control col-md-7 col-xs-12" value="<?php echo $data->address ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Tổng giá đơn hàng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" class="form-control col-md-7 col-xs-12" value="<?php echo number_format($data->total).' VNĐ' ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Ngày đặt hàng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y", strtotime($data->created)) ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Hạn chót giao hàng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y", (strtotime($data->created)+5*24*3600)) ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Ghi chú</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" readonly rows="3"><?php echo $data->note ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Đã giao hàng</label>
                            <label class="radio-inline"><input type="radio" name="status" value="0" <?php if ($data->status == "0") echo 'checked'; ?>>Chưa giao hàng</label>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php if ($_SESSION['useradmin']->role_id == 0): ?>
                            <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin</button>
                            <?php endif ?>
                            <a href="<?php Autoload::URL('admin/adminbill/print/'.$_GET['alias']) ?>" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> In hoá đơn</a>
                            <button class="btn btn-danger" type="button" id="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row mg-top-20">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-list" aria-hidden="true"></i> Chi tiết hoá đơn</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">ID Sản phẩm</th>
                            <th class="text-center">Hình / Tên sản phẩm</th>
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
                            <td class="text-center">
                                <img src="<?php Autoload::URL('imgs/products/'.$item->picture) ?>" alt="" height="80">
                                <p><?php echo $item->name_product ?></p>
                            </td>
                            <td class="text-center"><?php echo $item->quantity ?></td>
                            <td class="text-center"><?php echo number_format($item->real_price)." VNĐ" ?></td>
                            <td class="text-center"><?php echo number_format($item->total)." VNĐ" ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>