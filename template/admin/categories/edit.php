<?php

$this->view("admin.layouts.header");

$name = $category['name'];
$status = $category['status'];

$updateUrl = url("panel/category/update/" . $id);

?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Edit Category
                    </header>


                    <div class="card-body">
                        <form method="post" action="<?php echo $updateUrl; ?>">

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Status:</label>
                                <div class="col-md-12">


                                    <div class="make-switch" data-on="success" data-off="danger">
                                        <input name="status"
                                               type="checkbox" <?php if ($status == "enable") echo "checked" ?> >
                                    </div>


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

