<?php

$title = Null;
$mainTitle = $this->setting['title'];
$about = $this->setting['about'];
$logo = $this->setting['logo'];
$url = url("home");
$logoUrl = url($logo);
$icon = $this->setting['icon'];
$iconUrl = url($icon);
$this->view("app.layouts.header", compact("title", "mainTitle", "about", "logo", "url", "logoUrl", "iconUrl"));
?>

</header>

<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">

            <?
            $i = 1;
            foreach ($this->recentArticles as $recentArticle) {

            $id = $recentArticle['id'];
            $title = $recentArticle['title'];
            $view = $recentArticle['view'];
            $comment_count = $recentArticle['comment_count'];
            $created_at = date('d M Y', (strtotime($recentArticle['created_at'])));
            $user_id = $recentArticle['user_id'];
            $cat_id = $recentArticle['cat_id'];
            $category = $recentArticle['category'];

            $author = $recentArticle['author'];
            $image = $recentArticle['image'];
            $showArticle = url("show-article/" . $id);
            $showUser = url("show-user/" . $user_id);
            $showCat = url("show-category/" . $cat_id);
            $imageUrl = url($image);


            if ($i == 1) { ?>
            <div class="col-md-8 hot-post-left">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="<? echo $showArticle ?>"><img
                                src="<? echo $imageUrl ?>"
                                alt="<? echo $title ?>"></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="<? echo $showCat ?>"><? echo $category ?></a>
                        </div>
                        <h3 class="post-title title-lg"><a href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                        <ul class="post-meta">
                            <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                            <li> <? echo $created_at ?></li>
                            <li><i class="fa fa-comments"></i> <? echo $comment_count ?></li>
                            <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hot-post-right">
                <? }


                else {

                    ?>
                    <div class="post post-thumb">
                        <a class="post-img" href="<? echo $showArticle ?>"><img
                                    src="<? echo $imageUrl ?>"
                                    alt="<? echo $title ?>"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="<? echo $showCat ?>"><? echo $category ?></a>
                            </div>
                            <h3 class="post-title title-lg"><a href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                            <ul class="post-meta">
                                <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                                <li> <? echo $created_at ?></li>
                                <li><i class="fa fa-comments"></i> <? echo $comment_count ?></li>
                                <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                            </ul>
                        </div>
                    </div>


                    <?
                }
                if ($i == 3) {
                    break;
                }
                $i++;
                }
                ?>


            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Recent posts</h2>
                        </div>
                    </div>


                    <?

                    $i = 1;
                    foreach ($this->recentArticles as $recentArticle) {

                        $id = $recentArticle['id'];
                        $title = $recentArticle['title'];
                        $view = $recentArticle['view'];
                        $comment_count = $recentArticle['comment_count'];
                        $created_at = date('d M Y', (strtotime($recentArticle['created_at'])));
                        $user_id = $recentArticle['user_id'];
                        $cat_id = $recentArticle['cat_id'];
                        $category = $recentArticle['category'];

                        $author = $recentArticle['author'];
                        $image = $recentArticle['image'];
                        $showArticle = url("show-article/" . $id);
                        $showUser = url("show-user/" . $user_id);
                        $showCat = url("show-category/" . $cat_id);
                        $imageUrl = url($image);

                        ?>
                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="<? echo $showArticle ?>"><img
                                            src="<? echo $imageUrl ?>"
                                            alt="<? echo $title ?>"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="<? echo $showCat ?>"><? echo $category ?></a>
                                    </div>
                                    <h3 class="post-title title-lg"><a
                                                href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                                    <ul class="post-meta">
                                        <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                                        <li> <? echo $created_at ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <?
                        if ($i == 2) {
                            ?>

                            <div class="clearfix visible-md visible-lg"></div>
                            <?

                        }
                        if ($i == 4) {
                            break;
                        }

                        $i++;
                    }


                    ?>


                </div>
                <!-- /row -->

                <?
                foreach ($this->categories as $category) {

                    $catId = $category['id'];
                    $catName = $category['name'];
                    $catArticle_count = $category['article_count'];
                    $showCat = url("show-category/" . $catId);
                    if ($catArticle_count > 0) {
                        ?>
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="title"><a href="<? echo $showCat ?>"><? echo $catName ?></a></h2>
                                </div>
                            </div>

                            <?
                            $b = 1;
                            foreach ($this->recentArticles as $recentArticle) {
                                $id = $recentArticle['id'];
                                $title = $recentArticle['title'];
                                $view = $recentArticle['view'];
                                $comment_count = $recentArticle['comment_count'];
                                $created_at = date('d M Y', (strtotime($recentArticle['created_at'])));
                                $user_id = $recentArticle['user_id'];
                                $cat_id = $recentArticle['cat_id'];
                                $category = $recentArticle['category'];

                                $author = $recentArticle['author'];
                                $image = $recentArticle['image'];
                                $showArticle = url("show-article/" . $id);
                                $showUser = url("show-user/" . $user_id);
                                $showCat = url("show-category/" . $cat_id);
                                $imageUrl = url($image);

                                if ($cat_id == $catId) {
                                    ?>

                                    <!-- post -->
                                    <div class="col-md-4">
                                        <div class="post post-sm">
                                            <a class="post-img" href="<? echo $showArticle ?>"><img
                                                        src="<? echo $imageUrl ?>"
                                                        alt="<? echo $title ?>"></a>
                                            <div class="post-body">
                                                <div class="post-category">
                                                    <a href="<? echo $showCat ?>"><? echo $category ?></a>
                                                </div>
                                                <h3 class="post-title title-lg"><a
                                                            href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                                                <ul class="post-meta">
                                                    <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                                                    <li> <? echo $created_at ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /post -->


                                    <?
                                    $b++;
                                }
                                if ($b > 3) {
                                    break;
                                }


                            }
                            ?>

                        </div>
                        <!-- /row -->
                        <?
                    }


                    if ($i == 3) {
                        break;
                    }
                    $i++;
                }
                ?>


                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Articles</h2>
                        </div>
                    </div>

                </div>

                <?
                $i = 1;
                foreach ($this->recentArticles as $recentArticle) {

                    $id = $recentArticle['id'];
                    $title = $recentArticle['title'];
                    $summary = substr($recentArticle['summary'], 0, 250) . "...";
                    $view = $recentArticle['view'];
                    $comment_count = $recentArticle['comment_count'];
                    $created_at = date('d M Y', (strtotime($recentArticle['created_at'])));
                    $user_id = $recentArticle['user_id'];
                    $cat_id = $recentArticle['cat_id'];
                    $category = $recentArticle['category'];

                    $author = $recentArticle['author'];
                    $image = $recentArticle['image'];
                    $showArticle = url("show-article/" . $id);
                    $showUser = url("show-user/" . $user_id);
                    $showCat = url("show-category/" . $cat_id);
                    $imageUrl = url($image);
                    ?>

                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="<? echo $showArticle ?>"><img
                                    src="<? echo $imageUrl ?>" alt="<? echo $title ?>"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="<? echo $showCat ?>"><? echo $category ?></a>
                            </div>
                            <h3 class="post-title"><a href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                            <ul class="post-meta">
                                <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                                <li> <? echo $created_at ?></li>
                                <li><i class="fa fa-comments"></i> <? echo $comment_count ?></li>
                                <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                            </ul>
                            <p><? echo $summary ?></p>
                        </div>
                    </div>
                    <!-- /post -->


                    <?
                    if ($i == 5) {
                        break;
                    }
                }
                ?>


            </div>


            <?php
            $this->view("app.layouts.sidebar");


            ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- FOOTER -->
<?php
$this->view("app.layouts.footer", compact("title", "about", "url", "logoUrl",));

?>
