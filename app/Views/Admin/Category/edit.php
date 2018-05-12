<?php 
    if (isset($_GET['param'])) {
        $action_form = Autoload::URL('admin/admincategory/postUpdate/'.$_GET['alias'].'/'.$_GET['param'], 'return');
    } else {
        $action_form = Autoload::URL('admin/admincategory/postAdd/'.$_GET['alias'], 'return');
    }
 ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo mb_convert_case($as, MB_CASE_TITLE) ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="frmReq" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php echo $action_form ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên <?php echo $as ?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data->name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
                            <label class="radio-inline"><input type="radio" name="status" value="0" <?php if ($data->status == "0") echo 'checked'; ?>>Ẩn</label>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin</button>
                            <button class="btn btn-danger" type="button" id="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>