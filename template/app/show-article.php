<?php


$title = $article['title'];
$mainTitle = $this->setting['title'];
$about = $this->setting['about'];
$logo = $this->setting['logo'];
$url = url("home");
$logoUrl = url($logo);
$icon = $this->setting['icon'];
$iconUrl = url($icon);
$this->view("app.layouts.header", compact("title", "mainTitle", "about", "logo", "url", "logoUrl", "iconUrl"));


$articleid = $article['id'];
$body = $article['body'];
$view = $article['view'];
$comment_count = $article['comment_count'];
$created_at = date('d M Y', (strtotime($article['created_at'])));
$user_id = $article['user_id'];
$cat_id = $article['cat_id'];
$category = $article['category'];
$author = $article['author'];
$image = $article['image'];


$showArticle = url("show-article/" . $articleid);
$showUser = url("show-user/" . $user_id);
$showCat = url("show-category/" . $cat_id);
$imageUrl = url($image);

$comment_storeUrl = url("comment-store");

$userName = $user['name'];
$userAbout = $user['about'];
$userImage = url($user['image']);


?>

    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url('<? echo $imageUrl ?>')"
             data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="<? echo $showCat ?>"><? echo $category ?></a>
                    </div>
                    <h1><? echo $title ?></h1>
                    <ul class="post-meta">
                        <li><a href="<? echo $showUser ?>"><? echo $author ?></a></li>
                        <li> <? echo $created_at ?></li>
                        <li><i class="fa fa-comments"></i> <? echo $comment_count ?></li>
                        <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
    </header>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post share -->
                    <div class="section-row">
                        <div class="post-share">
                            <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                            <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                            <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                            <a href="#"><i class="fa fa-envelope"></i><span>Email</span></a>
                        </div>
                    </div>
                    <!-- /post share -->
                    <?
                    echo $body
                    ?>
                    <!-- post content -->
                    <div class="section-row">

                    </div>
                    <!-- /post content -->


                    <!-- post nav -->
                    <div class="section-row">
                        <div class="post-nav">

                            <?
                            if ($previousArticle) {

                                $article_id = $previousArticle['id'];
                                $title = $previousArticle['title'];
                                $image = $previousArticle['image'];
                                $created_at = date('d M Y', (strtotime($previousArticle['created_at'])));
                                $showArticle = url("/show-article/" . $article_id);
                                $imageUrl = url($image);
                                ?>
                                <div class="prev-post">
                                    <a class="post-img" href="<? echo $showArticle ?>"><img src="<? echo $imageUrl ?>"
                                                                                            alt="<? echo $title ?>"></a>

                                    <h3 class="post-title"><a href="<? echo $showArticle ?>"><? echo $title ?></a>
                                    </h3>
                                    <ul class="post-meta">
                                        <li> <? echo $created_at ?></li>
                                    </ul>
                                    <span>Previous Article</span>
                                </div>
                                <?

                            }
                            ?>



                            <?
                            if ($nextArticle) {

                                $article_id = $nextArticle['id'];
                                $title = $nextArticle['title'];
                                $image = $nextArticle['image'];
                                $created_at = date('d M Y', (strtotime($nextArticle['created_at'])));
                                $showArticle = url("/show-article/" . $article_id);
                                $imageUrl = url($image);
                                ?>
                                <div class="next-post">
                                    <a class="post-img" href="<? echo $showArticle ?>"><img src="<? echo $imageUrl ?>"
                                                                                            alt="<? echo $title ?>"></a>

                                    <h3 class="post-title"><a href="<? echo $showArticle ?>"><? echo $title ?></a>
                                    </h3>
                                    <ul class="post-meta">
                                        <li> <? echo $created_at ?></li>
                                    </ul>
                                    <span>Next Article</span>
                                </div>
                                <?

                            }
                            ?>


                        </div>
                    </div>
                    <!-- /post nav  -->

                    <!-- post author -->
                    <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">About <a href="<? echo $showUser ?>"><? echo $userName ?></a></h3>
                        </div>
                        <div class="author media">
                            <div class="media-left">
                                <a href="<? echo $showUser ?>">
                                    <img class="author-img media-object" src="<? echo $userImage ?>"
                                         alt="<? echo $userName ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <p> <? echo $userAbout ?></p>
                                <ul class="author-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post author -->

                    <!-- /related post -->
                    <div>
                        <div class="section-title">
                            <h3 class="title">Related Posts</h3>
                        </div>
                        <div class="row">

                            <?
                            $i = 1;
                            foreach ($categoryArticles as $categoryArticle) {

                                $id = $categoryArticle['id'];
                                $title = $categoryArticle['title'];
                                $summary = $categoryArticle['summary'];
                                $created_at = date('d M Y', (strtotime($categoryArticle['created_at'])));
                                $user_id = $categoryArticle['user_id'];
                                $cat_id = $categoryArticle['cat_id'];
                                $author = $categoryArticle['author'];
                                $image = $categoryArticle['image'];

                                $showArticle = url("show-article/" . $id);
                                $showUser = url("show-user/" . $user_id);
                                $showCat = url("show-category/" . $cat_id);
                                $imageUrl = url($image);
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
                                if ($i == 3) {
                                    break;
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /related post -->

                    <?
                    if ($comment_count > 0) {
                        ?>
                        <!-- post comments -->
                        <div class="section-row">
                            <div class="section-title">
                                <h3 class="title"><? echo $comment_count ?> Comments</h3>
                            </div>
                            <div class="post-comments">


                                <?
                                foreach ($comments as $comment) {
                                    $user_id = $comment['user_id'];
                                    $commentText = $comment['comment'];
                                    $image = $comment['image'];
                                    $imageUrl = url($image);
                                    $username = $comment['username'];
                                    $comment_created_at = date('d M Y', (strtotime($comment['created_at'])));


                                    ?>
                                    <!-- comment -->
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="<? echo $imageUrl ?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4><? echo $username ?></h4>
                                                <span class="time"><? echo $comment_created_at ?></span>
                                            </div>
                                            <p><? echo $commentText ?></p>
                                            <!--<a href="#" class="reply">Reply</a>-->
                                        </div>
                                    </div>
                                    <!-- /comment -->


                                    <?
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /post comments -->
                        <?
                    }

                    if (isset($_SESSION['user']) and $_SESSION['user'] != Null) {
                        ?>
                        <!-- post reply -->
                        <div class="section-row">
                            <div class="section-title">
                                <h3 class="title">Leave a comment</h3>
                            </div>
                            <form class="post-reply" action="<? echo $comment_storeUrl ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="article_id" value="<? echo $articleid ?>">
                                            <textarea class="input" name="comment" placeholder="comment..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="primary-button">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- /post reply -->
                        <?
                    } else {
                        ?>
                        <div class="section-row">
                            <div class="section-title">
                                <h3 class="title">Please <a href="<? echo url("login") ?>">login</a> for Leave a
                                    reply</h3>
                            </div>

                        </div>
                        <?
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
<?php

$this->view("app.layouts.footer", compact("title", "about", "url", "logoUrl"));


?>