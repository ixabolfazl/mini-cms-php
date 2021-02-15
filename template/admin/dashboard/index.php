<?php

$this->view("admin.layouts.header");

?>


    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol terques">
                            <i class="fa fa-file-text"></i>
                        </div>
                        <div class="value">
                            <h1 class="count">
                                0
                            </h1>
                            <p>Articles</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol red">
                            <i class="fa fa-eye"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count2">
                                0
                            </h1>
                            <p>views</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol blue">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count4">
                                0
                            </h1>
                            <p>Comments</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol yellow">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count3">
                                0
                            </h1>
                            <p>Users</p>
                        </div>
                    </section>
                </div>

            </div>
            <!--state overview end-->
            <script src="<? asset("admin/layouts/js/count.js") ?>"></script>

            <div class="row">
                <div class="col-lg-4">
                    <!--user info table start-->
                    <section class="card">

                        <header class="card-header">
                            Recent Articles
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>

                                <th class="hidden-phone">Title</th>
                                <th>Status</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?
                            foreach ($mostViewArticles as $article) {
                                $articleId = $article['id'];
                                $articleTitle = $article['title'];
                                $articleStatus = $article['status'];
                                $showUrl = url("/show-article/" . $articleId);
                                $enableUrl = url("/panel/article/enable/" . $articleId);
                                ?>
                                <tr>
                                    <td><a href="<? echo $showUrl ?>"><? if (strlen($articleTitle) > 35)
                                                echo substr($articleTitle, 0, 35) . "...";
                                            else echo $articleTitle; ?></a></td>
                                    <td><a href="<? echo $enableUrl ?>"
                                           class="badge badge-<?php if ($articleStatus == 'enable') echo "success"; else echo "danger"; ?> label-mini"><? echo $articleStatus ?></a>
                                    </td>


                                </tr>
                                <?
                            }
                            ?>


                            </tbody>
                        </table>
                    </section>
                    <!--user info table end-->
                </div>
                <div class="col-lg-4">
                    <!--user info table start-->
                    <section class="card">

                        <header class="card-header">
                            Most view Articles
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>

                                <th class="hidden-phone">Title</th>
                                <th>View</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?
                            foreach ($mostViewArticles as $article) {
                                $articleId = $article['id'];
                                $articleTitle = $article['title'];
                                $articleView = $article['view'];
                                $showUrl = url("/show-article/" . $articleId);
                                $enableUrl = url("/panel/article/enable/" . $articleId);
                                ?>
                                <tr>
                                    <td><a href="<? echo $showUrl ?>"><? if (strlen($articleTitle) > 35)
                                                echo substr($articleTitle, 0, 35) . "...";
                                            else echo $articleTitle; ?></a></td>
                                    <td><span class="badge badge-info label-mini"><? echo $articleView ?></span></td>


                                </tr>
                                <?
                            }
                            ?>


                            </tbody>
                        </table>
                    </section>
                    <!--user info table end-->
                </div>
                <div class="col-lg-4">
                    <!--user info table start-->
                    <section class="card">

                        <header class="card-header">
                            Most comment Articles
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>

                                <th class="hidden-phone">Title</th>
                                <th>Comments</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <?
                                foreach ($mostCommentArticles

                                as $article) {
                                $articleId = $article['id'];
                                $articleTitle = $article['title'];
                                $articleComment_count = $article['comment_count'];
                                $showUrl = url("/show-article/" . $articleId);
                                $enableUrl = url("/panel/article/enable/" . $articleId);
                                ?>
                            <tr>
                                <td><a href="<? echo $showUrl ?>"><? if (strlen($articleTitle) > 35)
                                            echo substr($articleTitle, 0, 35) . "...";
                                        else echo $articleTitle; ?></a></td>
                                <td><span class="badge badge-warninglabel-mini"><? echo $articleComment_count ?></span>
                                </td>

                            </tr>
                            <?
                            }
                            ?>

                            </tr>


                            </tbody>
                        </table>
                    </section>
                    <!--user info table end-->
                </div>
            </div>


        </section>
    </section>
    <script>
        //count article
        countUp(<? echo $articleCount?>);
        //count view
        countUp2(<? echo $viewCount?>);
        //count user
        countUp3(<? echo $userCount?>);
        //count comment
        countUp4(<? echo $commentCount?>);
    </script>
<?php
$this->view("admin.layouts.footer");
?>