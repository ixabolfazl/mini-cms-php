<?php


?>

<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="<? echo $url ?>" class="logo"><img src="<?php echo $logoUrl ?>"
                                                                    alt="<?php echo $title ?>"></a>
                    </div>
                    <p><? echo $about ?></p>
                    <ul class="contact-social">
                        <li><a href="#" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-widget">
                    <h3 class="footer-title">Categories</h3>
                    <div class="category-widget">
                        <ul>

                            <?
                            $i = 1;
                            foreach ($this->categories as $category) {

                                $catId = $category['id'];
                                $catName = $category['name'];
                                $catArticle_count = $category['article_count'];
                                $showCat = url("/show-category/" . $catId);
                                ?>

                                <li><a href="<? echo $showCat ?>"><? echo $catName ?>
                                        <span><? echo $catArticle_count ?></span></a></li>


                                <?
                                if ($i == 6) {
                                    break;
                                }
                                $i++;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-widget">
                    <h3 class="footer-title">Recent Articles</h3>
                    <?
                    $i = 1;
                    foreach ($this->recentArticles as $recentArticle) {

                        $id = $recentArticle['id'];
                        $title = $recentArticle['title'];
                        $view = $recentArticle['view'];
                        $cat_id = $recentArticle['cat_id'];
                        $category = $recentArticle['category'];
                        $user_id = $recentArticle['user_id'];

                        $author = $recentArticle['author'];
                        $image = $recentArticle['image'];
                        $showArticle = url("show-article/" . $id);
                        $showUser = url("show-user/" . $user_id);
                        $showCat = url("show-category/" . $cat_id);
                        $imageUrl = url($image);
                        ?>

                        <!-- post -->
                        <div class="post post-widget">
                            <a class="post-img" href="<? echo $showArticle ?>"><img src="<? echo $imageUrl ?>"
                                                                                    alt="<? echo $title ?>"></a>
                            <div class="post-body">

                                <h3 class="post-title"><a href="<? echo $showArticle ?>"><? echo $title ?></a></h3>
                                <div>
                                    <a class="post-category" href="<? echo $showCat ?>"><? echo $category ?></a>
                                    <div>
                                        <ul class="post-meta">
                                            <li><i class="fa fa-user"></i><a
                                                        href="<? echo $showUser ?>"> <? echo $author ?></a></li>
                                            <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                                        </ul>
                                    </div>
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
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="footer-bottom row">
            <div class="footer-copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | This Website is made with <i class="fa fa-heart-o" aria-hidden="true"></i>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="<? asset("app/layouts/js/jquery.min.js") ?>"></script>
<script src="<? asset("app/layouts/js/bootstrap.min.js") ?>"></script>
<script src="<? asset("app/layouts/js/jquery.stellar.min.js") ?>"></script>
<script src="<? asset("app/layouts/js/main.js") ?>"></script>

</body>

</html>