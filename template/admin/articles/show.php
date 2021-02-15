<?php

$this->view("admin.layouts.header");


$title = $article['title'];

$cat_id = $article['cat_id'];
$catName = $article['category'];
$catUrl = url("panel/category/show/" . $cat_id);

$summary = $article['summary'];
$body = $article['body'];
$image = $article['image'];
$imageUrl = url($image);


?>
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-8">

                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-success text-light">Title</div>
                        <div class="card-body">
                            <h3><?php echo $title ?></h3>
                        </div>

                    </div>
                </section>
                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-danger text-light">Summary</div>
                        <div class="card-body">
                            <?php echo $summary ?>

                        </div>

                    </div>
                </section>
                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-danger text-light">Category</div>
                        <div class="card-body">
                            <a href="<? echo $catUrl ?>">
                                <?php echo $catName ?>
                            </a>


                        </div>

                    </div>
                </section>


            </div>
            <div class="col-lg-4">
                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-warning text-light">image</div>
                        <div class="card-body">
                            <div style="height: 200px; width: 300px; overflow: hidden;Border-radius:5px ;margin: auto">
                                <img style="height: 200px; Border-radius:5px; display:block;margin: auto"
                                     src="<?php echo $imageUrl ?>" alt="">
                            </div>
                        </div>

                    </div>
                </section>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <section class="card">
                    <div class="card ui-sortable-handle">
                        <div class="card-header bg-primary text-light">Body</div>
                        <div class="card-body"><?php echo $body ?>
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

