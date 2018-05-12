<?php 
    if (isset($_GET['param'])) {
        $action_form = Autoload::URL('admin/adminproduct/postUpdate/'.$_GET['alias'].'/'.$_GET['param'], 'return');
    } else {
        $action_form = Autoload::URL('admin/adminproduct/postAdd', 'return');
    }
 ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sản phẩm</h2>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="frmReq" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php echo $action_form ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên sản phẩm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data[0]->name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thể loại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="category_id1" class="form-control">
                                <option value="0">--- Chọn thể loại ---</option>
                                <?php foreach ($cat as $item): ?>
                                    <option value="<?php echo $item->id ?>" <?php if($item->id == $data[0]->category_id1) echo 'selected' ?>><?php echo $item->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tác giả</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="category_id2" class="form-control">
                                <option value="0">--- Chọn tác giả ---</option>
                                <?php foreach ($aut as $item): ?>
                                    <option value="<?php echo $item->id ?>" <?php if($item->id == $data[0]->category_id2) echo 'selected' ?>><?php echo $item->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhà xuất bản</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="category_id3" class="form-control">
                                <option value="0">--- Chọn nhà xuất bản ---</option>
                                <?php foreach ($prc as $item): ?>
                                    <option value="<?php echo $item->id ?>" <?php if($item->id == $data[0]->category_id3) echo 'selected' ?>><?php echo $item->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">Hình sản phẩm</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if ($data[0]->picture != "") { ?>
                            <img src="<?php Autoload::URL('imgs/products/'.$data[0]->picture) ?>" alt="picture" height="300">
                            <?php } else { ?>
                            <img src="<?php Autoload::URL('imgs/noimg.png') ?>" alt="picture" height="300">
                            <?php } ?>
                            <input type="file" name="picture" class="form-control">
                            <input type="hidden" name="currentpicture" value="<?php echo $data[0]->picture ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Giá bán</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="price" min="0" id="price" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data[0]->price ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sale">Giảm giá <span>%</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="sale" min="0" id="sale" required="required" class="form-control col-md-7 col-xs-12 required" value="<?php if(isset($_GET['param'])) echo $data[0]->sale; else echo '0';?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="real_price">Giá hiện tại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="real_price" min="0" id="real_price" required="required" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data[0]->real_price ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Đơn vị tiền</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="currency" class="form-control">
                                <option value="0" <?php if($data[0]->currency == "VNĐ") echo 'selected' ?>>Việt Nam (VNĐ)</option>
                                <option value="1" <?php if($data[0]->currency == "USD") echo 'selected' ?>>Mỹ (USD)</option>
                                <option value="2" <?php if($data[0]->currency == "EUR") echo 'selected' ?>>Châu Âu (EUR)</option>
                                <option value="3" <?php if($data[0]->currency == "AUD") echo 'selected' ?>>Úc (AUD)</option>
                                <option value="4" <?php if($data[0]->currency == "JPY") echo 'selected' ?>>Nhật (JPY)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả / Giới thiệu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="description" rows="5" class="form-control"><?php echo $data[0]->description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="content" id="content" rows="5" class="form-control editor"><?php echo $data[0]->content ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Đặc biệt</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" name="hot_1" value="1" <?php if($data[0]->hot_1 == 1) echo 'checked'; ?>>Nổi bật</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="hot_2" value="1" <?php if($data[0]->hot_2 == 1) echo 'checked'; ?>>Bán chạy</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="hot_3" value="1" <?php if($data[0]->hot_3 == 1) echo 'checked'; ?>>Hot</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
                            <label class="radio-inline"><input type="radio" name="status" value="0" <?php if ($data[0]->status == "0") echo 'checked'; ?>>Ẩn</label>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-back").click(function() {
            window.history.back();
        });

        $("#price").blur(function() {
            var sale = $("#sale").val();
            if (sale == 0 || sale == "") {
                $("#real_price").val($(this).val());
                
            } else {
                var rs = $(this).val() - $(this).val() * sale / 100;
                $("#real_price").val(rs);
                
            }   
        });

        $("#sale").blur(function() {
            if ($("#price").val() != 0 || $("#price").val() != "") {
                var rs = $("#price").val() - $("#price").val() * $(this).val() / 100;
                $("#real_price").val(rs);
            }
        });
    

    });
</script>
<script type="text/javascript" src="<?php Autoload::URL('js/admin/ajaxAdmin.js') ?>"></script>