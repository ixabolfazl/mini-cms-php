<?php

$this->view("admin.layouts.header");


$title = $setting['title'];
$description = $setting['description'];
$about = $setting['about'];
$keywords = $setting['keywords'];
$logo = $setting['logo'];
$icon = $setting['icon'];
$url = $setting['url'];


$updateUrl = url("setting/update");


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-8">
                <section class="card">


                    <header class="card-header">
                        Setting
                    </header>
                    <div class="card-body">
                        <form action="<? echo url("panel/setting/update") ?>" class="form-horizontal tasi-form"
                              method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Title:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="<?php echo $title ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Description:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="description" name="description" class="form-control"
                                           value="<?php echo $description ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">About:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="about" name="about" class="form-control"
                                           value="<?php echo $about ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Keywords:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="keywords" name="keywords" class="form-control"
                                           value="<?php echo $keywords; ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Logo:</label>
                                <div class="col-lg-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="<?php echo url('/public/photos/setting/noimage.png'); ?>" alt="">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i
                                                               class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" id="logo" name="logo">
                                                   </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label col-lg-2 mb-3">Icon:</label>
                                        <div class="col-lg-10">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    <img src="<?php echo url('/public/photos/setting/noimage.png'); ?>"
                                                         alt="">
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i
                                                               class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" id="icon" name="icon">
                                                   </span>
                                                </div>
                                            </div>


                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>

                        </form>
                    </div>

                </section>


            </div>
            <div class="col-lg-4">
                <section class="card">
                    <header class="card-header">
                        Logo
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal tasi-form">

                            <div class="form-group">

                                <div class="col-sm-10">
                                    <img style="width: 300px; Border-radius:5px; display:block;margin: auto"
                                         src="<?php echo url($logo); ?>" alt="logo">
                                </div>
                            </div>

                        </form>
                    </div>

                </section>
                <section class="card">
                    <header class="card-header">
                        icon
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal tasi-form"
                        ">

                        <div class="form-group">

                            <div class="col-sm-10">
                                <img style="width: 300px; Border-radius:5px; display:block;margin: auto"
                                     src="<?php echo url($icon); ?>" alt="icon">
                            </div>
                        </div>

                        </form>
                    </div>

                </section>


            </div>
        </div>


    </section>
</section>

<?php
$this->view("admin.layouts.footer");
?>

