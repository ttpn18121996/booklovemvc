<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin liên hệ từ khách hàng</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Ngày gửi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y", $data->created) ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Ghi chú</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" readonly rows="3"><?php echo $data->note ?></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-danger" type="button" id="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>