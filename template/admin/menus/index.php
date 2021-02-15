<?php

$this->view("admin.layouts.header");
$createUrl = url("panel/menu/create");
?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Menus
                        <span class="pull-right">
                         <a href="<? echo $createUrl ?>" type="button" id="loading-btn"
                            class="btn btn-success btn-sm"><i class="fa fa-plus"></i> New Menu</a>
                      </span>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Parent</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1;
                        foreach ($menus as $menu) {

                            $id = $menu['id'];
                            $name = $menu['name'];
                            $url = $menu['url'];
                            $parent = $menu['parent_id'];
                            $status = $menu['status'];
                            $parentName = $menu['parent'];
                            $enableUrl = url("panel/menu/enable/" . $id);
                            $deleteUrl = url("panel/menu/delete/" . $id);
                            $editUrl = url("panel/menu/edit/" . $id);


                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php

                                    if (strlen($name) > 50)
                                        echo substr($name, 0, 50) . "...";
                                    else echo $name;

                                    ?></a></td>
                                <td><a href="<?php echo $url; ?>"><?php

                                    if (strlen($url) > 50)
                                        echo substr($url, 0, 50) . "...";
                                    else echo $url;

                                    ?></td>
                                <td>
                                    <div class="badge badge-<?php if ($parent == '') echo "primary"; else echo "warning"; ?> label-mini"><?php if ($parent == "") echo "Main"; else echo $parentName; ?></div>
                                </td>

                                <td><a href="<?php echo $enableUrl; ?>"
                                       class="badge badge-<?php if ($status == 'enable') echo "success"; else echo "danger"; ?> label-mini"><?php echo $status; ?>
                                </td>
                                <td>
                                    <a href="<?php echo $editUrl; ?>" class="btn btn-primary btn-sm"><i
                                                class="fa fa-pencil"></i></a>
                                    <a href="<?php echo $deleteUrl; ?>" class="btn btn-danger btn-sm"
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

