<?php

$this->view("admin.layouts.header");


?>

<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Comments
                    </header>
                    <div class="card-body">
                        <div class="adv-table">
                            <table class="table table-striped table-advance table-hover" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                    <th>Article</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>


                                <?php


                                $i = 1;
                                foreach ($comments as $comment) {

                                    $id = $comment['id'];
                                    $commentText = $comment['comment'];
                                    $user_id = $comment['user_id'];
                                    $article_id = $comment['article_id'];
                                    $status = $comment['status'];
                                    $username = $comment['username'];
                                    $article = $comment['article'];
                                    $created_at = date('d M Y', (strtotime($comment['created_at'])));


                                    $showUrl = url("panel/comment/show/" . $id);
                                    $showArticle = url("show-article/" . $article_id);
                                    $statusUrl = url("panel/comment/status/" . $id);
                                    $deleteUrl = url("panel/comment/delete/" . $id);
                                    $editUrl = url("panel/comment/edit/" . $id);
                                    ?>


                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo $showUrl ?>" onclick=""><?php

                                                if (strlen($commentText) > 30)
                                                    echo substr($commentText, 0, 30) . "...";
                                                else echo $commentText;

                                                ?>

                                            </a></td>
                                        <td><?php

                                            echo $username

                                            ?></td>

                                        <td><a href="<?php echo $showArticle ?>"><?php


                                                if (strlen($article) > 15)
                                                    echo substr($article, 0, 15) . "...";
                                                else echo $article;

                                                ?></a></td>
                                        <td><?php

                                            echo $created_at

                                            ?></td>
                                        <td>
                                            <?
                                            if ($status == "unseen") {
                                                echo $status
                                                ?>
                                                <span class="badge badge-danger label-mini">New</span>
                                                <?

                                            } else {
                                                ?>
                                                <? echo $status ?>
                                                <?
                                            }
                                            ?>

                                        </td>
                                        <td><a href="<?php echo $statusUrl; ?>"
                                               class="badge badge-<?php if ($status == 'approved') echo "danger"; else echo "primary"; ?> label-mini">


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


                                            </a></td>
                                        <td>
                                            <a href="<?php echo $editUrl; ?>" class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil"></i></a>
                                            <a href="<?php echo $deleteUrl; ?>" class="btn btn-danger btn-sm"
                                               onClick="return confirm('Do you want to delete?')"><i
                                                        class="fa fa-trash-o "></i></a>

                                        </td>

                                    </tr>
                                    <?php $i++;
                                } ?>


                                </tbody>

                            </table>
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

