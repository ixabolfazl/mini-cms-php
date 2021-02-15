<?php

$this->view("admin.layouts.header");


$createUrl = url("panel/article/create");


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Articles
                        <span class="pull-right">
                         <a href="<? echo $createUrl ?>" type="button" id="loading-btn"
                            class="btn btn-success btn-sm"><i class="fa fa-plus"></i> New Article</a>
                      </span>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>View</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1;
                        foreach ($articles as $article) {


                            $id = $article['id'];
                            $title = $article['title'];
                            $summary = $article['summary'];
                            $view = $article['view'];
                            $user_id = $article['user_id'];
                            $cat_id = $article['cat_id'];
                            $category = $article['category'];
                            $username = $article['username'];
                            $status = $article['status'];
                            $image = $article['image'];


                            $showUrl = url("panel/article/show/" . $id);
                            $enableUrl = url("panel/article/enable/" . $id);
                            $deleteUrl = url("panel/article/delete/" . $id);
                            $editUrl = url("panel/article/edit/" . $id);
                            $imageUrl = url($image);
                            $catShowUrl = url("panel/category/show/" . $cat_id);


                            ?>


                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><a href="<?php echo $showUrl ?>"><?php

                                        if (strlen($title) > 50)
                                            echo substr($title, 0, 50) . "...";
                                        else echo $title;

                                        ?></a></td>
                                <td><?php

                                    if (strlen($summary) > 40)
                                        echo substr($summary, 0, 40) . "...";
                                    else echo $summary;

                                    ?></td>
                                <td><?php echo $view; ?></td>
                                <td><?php echo $username ?></td>
                                <td><a href="<?php echo $catShowUrl ?>"><?php echo $category ?></a></td>
                                <td>
                                    <div style="height: 50px;width: 70px; overflow: hidden;Border-radius:5px; "><img
                                                style="height: 50px; " src="<?php echo $imageUrl ?>" alt=""></div>
                                </td>
                                <td><a href="<?php echo $enableUrl; ?>"
                                       class="badge badge-<?php if ($status == 'enable') echo "success"; else echo "danger"; ?> label-mini"><?php echo $status; ?></a>
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

