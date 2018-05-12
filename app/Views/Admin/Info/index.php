<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin website / Cập nhật: <?php echo date("d/m/Y H:i:s", strtotime(Autoload::Info("updated", "return"))) ?></h2>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="frmReq" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php Autoload::URL('admin/admininfo/update') ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12 required" value="<?php echo $data[0]->name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" value="<?php echo $data[0]->title ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="banner">Banner</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if ($data[0]->banner != "") { ?>
                            <img src="<?php Autoload::URL('imgs/'.$data[0]->banner) ?>" alt="Banner">
                            <?php } else { ?>
                            <img src="<?php Autoload::URL('imgs/noimg.png') ?>" alt="Banner" width="150">
                            <?php } ?>
                            <input type="file" name="banner" class="form-control">
                            <input type="hidden" name="currentbanner" value="<?php echo $data[0]->banner ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if ($data[0]->logo != "") { ?>
                            <img src="<?php Autoload::URL('imgs/'.$data[0]->logo) ?>" alt="Logo" width="186" height="74">
                            <?php } else { ?>
                            <img src="<?php Autoload::URL('imgs/noimg.png') ?>" alt="Logo" width="186" height="74">
                            <?php } ?>
                            <input type="file" name="logo" class="form-control">
                            <input type="hidden" name="currentlogo" value="<?php echo $data[0]->logo ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Favicon</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php if ($data[0]->favicon != "") { ?>
                            <img src="<?php Autoload::URL('imgs/'.$data[0]->favicon) ?>" alt="Favicon" width="64" height="64">
                            <?php } else { ?>
                            <img src="<?php Autoload::URL('imgs/noimg.png') ?>" alt="favicon" width="64" height="64">
                            <?php } ?>
                            <input type="file" name="favicon" class="form-control">
                            <input type="hidden" name="currentfavicon" value="<?php echo $data[0]->favicon ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyword">Keyword</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="keyword" id="keyword" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->keyword ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="description" id="description" class="form-control col-md-7 col-xs-12" rows="5"><?php echo $data[0]->description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả / Giới thiệu</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="content" id="content" rows="5" class="form-control editor"><?php echo $data[0]->content ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Footer</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="footer" id="footer" rows="5" class="form-control editor"><?php echo $data[0]->footer ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Google map</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="google_map" class="form-control col-md-7 col-xs-12" rows="5"><?php echo $data[0]->google_map ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" id="email" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Điện thoại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="phone" id="phone" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->phone ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hotline">Hotline</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="hotline" id="hotline" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->hotline ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Địa chỉ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="address" id="address" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->address ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook">Facebook</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="facebook" id="facebook" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->facebook ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter">Twitter</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="twitter" id="twitter" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->twitter ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_plus">Goole plus</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="google_plus" id="google_plus" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->google_plus ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="skype">Skype</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="skype" id="skype" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->skype ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtube">Youtube</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="youtube" id="youtube" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->youtube ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zalo">Zalo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="zalo" id="zalo" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->zalo ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="website" id="website" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]->website ?>">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>