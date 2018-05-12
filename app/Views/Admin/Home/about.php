<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nội dung trang giới thiệu / Cập nhật: <?php echo date("d/m/Y H:i:s", $data->updated) ?></h2>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="frmReq" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php Autoload::URL('admin/admin/about') ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Nội dung</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <textarea name="content" id="content" rows="5" class="form-control editor"><?php echo $data->content ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="keyword">Keyword</label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            <input type="text" name="keyword" id="keyword" class="form-control col-md-7 col-xs-12" value="<?php echo $data->keyword ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Description</label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            <textarea name="description" id="description" class="form-control col-md-7 col-xs-12" rows="5"><?php echo $data->description ?></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-2">
                            <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>