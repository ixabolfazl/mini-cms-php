<?php

$this->view("admin.layouts.header");
$id = $user['id'];
$name = $user['name'];
$username = $user['username'];
$email = $user['email'];
$about = $user['about'];
$image = $user['image'];
$status = $user['status'];
$permission = $user['permission'];
$updateUrl = url("panel/user/update/" . $id);


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
                        <form action="<?php echo $updateUrl ?>" class="form-horizontal tasi-form" method="post"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="<?php echo $name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Username:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="username" name="username" class="form-control"
                                           value="<?php echo $username ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Email:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="email" name="email" class="form-control"
                                           value="<?php echo $email ?>">
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
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Permission:</label>
                                <div class="col-lg-4">
                                    <select name="permission" id="permission" class="custom-select mb-3" required>
                                        <option selected value="admin">Admin</option>
                                        <option <?php if ($permission == 'user') echo 'selected' ?> value="user">User
                                        </option>
                                    </select>


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2 mb-3">Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <!--                            <div class="form-group">-->
                            <!--                                <label class="col-sm-2 control-label col-lg-2 mb-3">Re-enter password:</label>-->
                            <!--                                <div class="col-sm-8">-->
                            <!--                                    <input type="password" id="password" name="password" class="form-control">-->
                            <!--                                </div>-->
                            <!--                            </div>-->

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
                                <label class="col-sm-2 control-label col-lg-2 mb-3">About:</label>
                                <div class="col-lg-8">

                                    <textarea class="form-control" id="about"
                                              name="about"><?php echo $about ?></textarea>

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

