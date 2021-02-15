<?php

$this->view("admin.layouts.header");

$id = $comment['id'];
$commentText = $comment['comment'];
$status = $comment['status'];
$updateUrl = url("panel/comment/update/" . $id);


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">

                    <header class="card-header">
                        Edit Comment
                    </header>
                    <div class="card-body">
                        <form action="<?php echo $updateUrl ?>" class="form-horizontal tasi-form" method="post"
                              enctype="multipart/form-data">


                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Status:</label>
                                <div class="col-md-8">


                                    <div class="make-switch" data-on="success" data-off="danger">
                                        <input name="status"
                                               type="checkbox" <?php if ($status == "approved") echo "checked" ?> >
                                    </div>


                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Comment:</label>
                                <div class="col-lg-8">

                                    <textarea class="form-control" id="comment" name="comment" rows="10"
                                              required><?php echo $commentText ?></textarea>

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

