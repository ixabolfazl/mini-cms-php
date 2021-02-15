<?php

$this->view("admin.layouts.header");

$id = $comment['id'];
$commentText = $comment['comment'];
$user_id = $comment['user_id'];
$article_id = $comment['article_id'];
$status = $comment['status'];
$username = $comment['username'];
$article = $comment['article'];
$created_at = date('d M Y', (strtotime($comment['created_at'])));


$showArticle = url("panel/show-article/" . $article_id);
$statusUrl = url("panel/comment/status/" . $id);
$deleteUrl = url("panel/comment/delete/" . $id);
$editUrl = url("panel/comment/edit/" . $id);


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-8">

                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-primary text-light">Comment:</div>
                        <div class="card-body"><?php echo $commentText ?>
                        </div>

                    </div>
                </section>
                <section class="card">
                    <header class="card-header">
                        details:
                    </header>
                    <div class="card-body">
                        <p>
                            <b>Username: </b><?php echo $username ?><br>
                            <b>Article: </b><a href="<? echo $showArticle ?>"><?php echo $article ?></a><br>
                            <b>Date: </b><? echo $created_at ?>
                        </p>
                    </div>
                </section>


            </div>
            <div class="col-lg-4">

                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-danger text-light">Status:</div>
                        <div class="card-body">

                            <span type="button"
                                  class="btn btn-<? if ($status == 'approved') echo "success"; else echo "warning " ?> btn-xs btn-block"><? echo $status ?></span>
                            <br>

                            <div style="text-align: center">
                                <a href="<?php echo $statusUrl; ?>"
                                   class="btn btn-<?php if ($status == 'approved') echo "info "; else echo "success"; ?> btn-sm">


                                    <?php if ($status == 'approved') {

                                        ?>
                                        <i class="fa fa-times"></i>

                                        <?
                                        echo "unapproved";


                                    } else {
                                        ?>
                                        <i class="fa fa-check"></i>
                                        <?
                                        echo "approve";
                                    } ?>


                                </a>

                                <a href="<?php echo $editUrl; ?>" class="btn btn-primary btn-sm"><i
                                            class="fa fa-pencil"></i> Edit</a>
                                <a href="<?php echo $deleteUrl; ?>" class="btn btn-danger btn-sm"
                                   onClick="return confirm('Do you want to delete?')"><i class="fa fa-trash-o "></i>
                                    Delete</a>
                            </div>


                        </div>

                    </div>
                </section>


            </div>
        </div>


    </section>
</section>

<?php
$this->view("admin.layouts.footer");
?>

