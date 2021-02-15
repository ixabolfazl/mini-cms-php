<?php

$this->view("admin.layouts.header");


$createUrl = url("panel/user/store");


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">

                    <header class="card-header">
                        Edit User
                    </header>
                    <div class="card-body">
                        <form action="<?php echo $createUrl ?>" class="form-horizontal tasi-form" method="post"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter Name..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Username:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="username" name="username" class="form-control"
                                           placeholder="Enter Username..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Email:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="email" name="email" class="form-control"
                                           placeholder="Enter Email..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Status:</label>
                                <div class="col-md-8">


                                    <div class="make-switch" data-on="success" data-off="danger">
                                        <input name="status"
                                               type="checkbox" checked>
                                    </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Permission:</label>
                                <div class="col-lg-4">
                                    <select name="permission" id="permission" class="custom-select mb-3" required>
                                        <option selected value="admin">Admin</option>
                                        <option selected value="user">User</option>
                                    </select>


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Enter Password..." required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Image:</label>
                                <div class="col-lg-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail"
                                             style=" height: 150px; Border-radius:5px;">
                                            <img style=" height: 150px; Border-radius:5px;"
                                                 src="<?php echo url('public/photos/setting/noimage.png'); ?>"
                                                 alt="image">
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
                                <label class="col-sm-2 control-label col-lg-2 mb-3">About:</label>
                                <div class="col-lg-8">

                                    <textarea class="form-control" id="about"
                                              placeholder="Enter About..." required name="about"> </textarea>

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

