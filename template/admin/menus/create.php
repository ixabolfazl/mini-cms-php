<?php

$this->view("admin.layouts.header");


$storeUrl = url("panel/menu/store");


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">

            <div class="col-lg-12">

                <section class="card">

                    <header class="card-header">
                        New Menu
                    </header>
                    <div class="card-body">
                        <form action="<?php echo $storeUrl; ?>" class="form-horizontal tasi-form" method="post">


                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Status:</label>
                                <div class="col-md-12">


                                    <div class="make-switch" data-on="success" data-off="danger">
                                        <input name="status" type="checkbox">
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">URL:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="url" name="url" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Parent:</label>
                                <div class="col-lg-5">
                                    <select name="parent_id" id="parent_id" class="custom-select mb-3">
                                        <option selected value="Null">Main</option>
                                        <?php foreach ($menus as $menu) { ?>
                                            <option value="<?php echo $menu['id'] ?>"><?php echo $menu['name'] ?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Create</button>
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

