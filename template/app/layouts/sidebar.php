<?php


?>
<div class="col-md-4">


    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
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

                    <li><a href="<? echo $showCat ?>"><? echo $catName ?> <span><? echo $catArticle_count ?></span></a>
                    </li>


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
    <!-- /category widget -->


    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Popular Posts</h2>
        </div>


        <?
        $i = 1;
        foreach ($this->popularArticles as $popularArticle) {

            $id = $popularArticle['id'];
            $title = $popularArticle['title'];
            $view = $popularArticle['view'];
            $cat_id = $popularArticle['cat_id'];
            $category = $popularArticle['category'];
            $user_id = $popularArticle['user_id'];

            $author = $popularArticle['author'];
            $image = $popularArticle['image'];
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
                    <div class="post-category">
                        <a href="<? echo $showCat ?>"><? echo $category ?></a>

                        <ul class="post-meta">
                            <li><i class="fa fa-user"></i><a href="<? echo $showUser ?>"> <? echo $author ?></a></li>
                            <li><i class="fa fa-eye"></i> <? echo $view ?></li>
                        </ul>

                    </div>

                </div>
            </div>
            <!-- /post -->

            <?
            if ($i == 10) {
                break;
            }

            $i++;
        }
        ?>

    </div>
    <!-- /post widget -->


</div>