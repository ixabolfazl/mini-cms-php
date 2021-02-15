<?php

$this->view("admin.layouts.header");


$createUrl = url("panel/user/create");


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Users
                        <span class="pull-right">
                         <a href="<?php echo $createUrl ?>" type="button" id="loading-btn"
                            class="btn btn-success btn-sm"><i class="fa fa-plus"></i> New User</a>
                      </span>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Posts</th>
                            <th>Image</th>
                            <th>Permission</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1;
                        foreach ($users as $user) {

                            $id = $user['id'];
                            $name = $user['name'];
                            $username = $user['username'];
                            $email = $user['email'];
                            $permission = $user['permission'];
                            $status = $user['status'];
                            $image = $user['image'];
                            $posts = $this->userPosts($id);
                            $imageUrl = url($image);


                            $enableUrl = url("panel/user/enable/" . $id);
                            $permissionUrl = url("panel/user/permission/" . $id);
                            $deleteUrl = url("panel/user/delete/" . $id);
                            $editUrl = url("panel/user/edit/" . $id);

                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $posts ?></td>
                                <td>
                                    <div style="height: 50px;width: 50px; overflow: hidden;Border-radius:5px; "><img
                                                style="height: 50px; " src="<?php echo $imageUrl ?>" alt=""></div>
                                </td>
                                <td><a href="<?php echo $permissionUrl; ?>"
                                       class="badge badge-<?php if ($permission == 'admin') echo "primary "; else echo "warning"; ?> label-mini"
                                       onClick="return confirm('Do you want to change permission?')"><?php echo $permission ?></a>
                                </td>
                                <td><a href="<?php echo $enableUrl; ?>"
                                       class="badge badge-<?php if ($status == 'enable') echo "success"; else echo "danger"; ?> label-mini"
                                       onClick="return confirm('Do you want to change?')"><?php echo $status ?></a></td>
                                <td>
                                    <a href="<?php echo $editUrl; ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo $deleteUrl; ?>"
                                       class="btn btn-danger btn-sm" onClick="return confirm('Do you want to delete?')"><i
                                                class="fa fa-trash-o "></i></a>

                                </td>

                            </tr>


                            <?php $i++;
                        } ?>


                        </tbody>
                    </table>
                </section>
            </div>
        </div>


    </section>
</section>

<?php
$this->view("admin.layouts.footer");
?>

