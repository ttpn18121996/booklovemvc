<?php 
    if (isset($_GET['param'])) {
        $action_form = Autoload::URL('admin/adminpicture/postUpdate/'.$_GET['alias'].'/'.$_GET['param'], 'return');
    } else {
        $action_form = Autoload::URL('admin/adminpicture/postAdd', 'return');
    }
 ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Hình ảnh</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php echo $action_form ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phân loại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="module" class="form-control">
                                <option value="0">--- Chọn loại ---</option>
                                <option value="slide" <?php if($data->module == 'slide') echo 'selected'; ?>>Slide</option>
                                <option value="quang-cao" <?php if($data->module == 'quang-cao') echo 'selected'; ?>>Hình quảng cáo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên hình</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $data->name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">Hình ảnh</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if ($data->picture != "") { ?>
                            <img src="<?php Autoload::URL('imgs/'.$data->picture) ?>" alt="picture" height="250">
                            <?php } else { ?>
                            <img src="<?php Autoload::URL('imgs/noimg.png') ?>" alt="picture" height="250">
                            <?php } ?>
                            <input type="file" name="picture" class="form-control">
                            <input type="hidden" name="currentpicture" value="<?php echo $data->picture ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="link" id="link" class="form-control col-md-7 col-xs-12" value="<?php echo $data->link ?>">
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