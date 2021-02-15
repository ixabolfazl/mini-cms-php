<?php

$this->view("admin.layouts.header");


$createUrl = url("panel/category/create");

?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Categories
                        <span class="pull-right">
                           <a href="<?php echo $createUrl ?>" type="button" id="loading-btn"
                              class="btn btn-success btn-sm"><i class="fa fa-plus"></i> New Category</a>
                      </span>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>Name</th>
                            <th>Posts</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1;
                        foreach ($categories as $category) {

                            $id = $category['id'];
                            $name = $category['name'];
                            $posts = $category['count'];

                            $status = $category['status'];


                            $showUrl = url("panel/category/show/" . $id);
                            $enableUrl = url("panel/category/enable/" . $id);
                            $deleteUrl = url("panel/category/delete/" . $id);
                            $editUrl = url("panel/category/edit/" . $id);


                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><a href="<?php echo $showUrl ?>"><?php echo $name ?></a></td>
                                <td><?php echo $posts ?></td>
                                <td><a href="<?php echo $enableUrl ?>"
                                       class="badge badge-<?php if ($status == 'enable') echo "success "; else echo "danger"; ?> label-mini"><?php echo $status; ?></a>
                                </td>
                                <td>
                                    <a href="<?php echo $editUrl ?>" class="btn btn-primary btn-sm"><i
                                                class="fa fa-pencil"></i></a>
                                    <a href="<?php echo $deleteUrl ?>" class="btn btn-danger btn-sm"
                                       onClick="return confirm('Do you want to delete?')"><i class="fa fa-trash-o "></i></a>

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

