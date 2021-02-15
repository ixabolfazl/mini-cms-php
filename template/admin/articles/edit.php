<?php

$this->view("admin.layouts.header");


$title = $article['title'];
$status = $article['status'];
$cat_id = $article['cat_id'];
$summary = $article['summary'];
$body = $article['body'];
$image = $article['image'];
$updateUrl = url("article/update/" . $id);


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">

                    <header class="card-header">
                        Edit Article
                    </header>
                    <div class="card-body">
                        <form action="<?php echo $updateUrl ?>" class="form-horizontal tasi-form" method="post"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Title:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="<?php echo $title ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Status:</label>
                                <div class="col-md-8">


                                    <div class="make-switch" data-on="success" data-off="danger">
                                        <input name="status"
                                               type="checkbox" <?php if ($status == "enable") echo "checked" ?> >
                                    </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Category:</label>
                                <div class="col-lg-4">
                                    <select name="cat_id" id="cat_id" class="custom-select mb-3" required>
                                        <option value="">Select</option>
                                        <?php foreach ($categories as $category) { ?>
                                            <option <?php
                                            if ($cat_id == $category['id']) {
                                                echo "selected";
                                            }
                                            ?> value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Image:</label>
                                <div class="col-lg-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail"
                                             style=" height: 150px; Border-radius:5px;">
                                            <img style=" height: 150px; Border-radius:5px;"
                                                 src="<?php echo url($image); ?>" alt="image">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i
                                                               class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" id="image" name="image">
                                                   </span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">summary:</label>
                                <div class="col-lg-12">

                                    <textarea class="form-control" id="summary" name="summary" " required
                                    ><?php echo $summary ?></textarea>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Body:</label>
                                <div class="col-lg-12">

                                            <textarea class="form-control" id="tiny" rows="20" name="body"
                                                      required><?php echo $body ?></textarea>

                                </div>


                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Update</button>
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

