<?php


$title = $this->title;
$logo = $this->setting['logo'];
$url = url("home");
$logoUrl = url($logo);
$unseenCommentCount = $this->unseenCommentCount;
//urls

$dashboardUrl = url("panel/admin");
$articlesUrl = url("panel/article");
$newArticlesUrl = url("panel/article/create");
$categoriesUrl = url("panel/category");
$newCategoryUrl = url("panel/category/create");
$commentUrl = url("panel/comment");
$menusUrl = url("panel/menu");
$newMenuUrl = url("panel/menu/create");
$usersUrl = url("panel/users");
$newUserUrl = url("panel/user/create");
$settingUrl = url("panel/setting");
$logoutUrl = url("logout");

//user
$user = $this->user;
$user_name = $user['name'];
$user_id = $user['id'];
$user_image = $user['image'];
$userUrl = url("panel/user/edit/" . $user_id);
$imageUrl = url($user_image);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $title ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<? asset("admin/layouts/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<? asset("admin/layouts/css/bootstrap-reset.css") ?>" rel="stylesheet">
    <!--external css-->
    <link href="<? asset("admin/layouts/assets/font-awesome/css/font-awesome.css") ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<? asset("admin/layouts/css/owl.carousel.css") ?>" type="text/css">
    <!--right slidebar-->
    <link href="<? asset("admin/layouts/css/slidebars.css") ?>" rel="stylesheet">
    <!-- Custom styles for this template -->

    <link href="<? asset("admin/layouts/css/style.css") ?>" rel="stylesheet">
    <link href="<? asset("admin/layouts/css/style-responsive.css") ?>" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css"
          href="<? asset("admin/layouts/assets/bootstrap-fileupload/bootstrap-fileupload.css") ?>"/>

    <!--dynamic table-->
    <link href="<? asset("admin/layouts/assets/advanced-datatable/media/css/demo_page.css") ?>" rel="stylesheet"/>
    <link href="<? asset("admin/layouts/assets/advanced-datatable/media/css/demo_table.css") ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<? asset("admin/layouts/assets/data-tables/DT_bootstrap.css") ?>"/>

    <!--bootstrap switcher-->
    <link rel="stylesheet" type="text/css"
          href="<? asset("admin/layouts/assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css") ?>"/>

    <link rel="stylesheet" type="text/css" href="<? asset("admin/layouts/assets/switchery/switchery.css") ?>"/>
    <style>
        .tox-notification {
            display: none !important;
        }

        .mce-notification {
            display: none !important;
        }
    </style>
    <script src="<? asset("admin/layouts/js/count.js") ?>"></script>
    <script src="<? asset("admin/layouts/js/jquery.js") ?>"></script>


</head>

<body class="light-sidebar-nav">

<section id="container">
    <!--header start-->
    <header class="header dark-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="<? echo BASE_URL ?>" class="logo">Mini<span>Cms</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">

                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle"
                       href="<? if ($unseenCommentCount > 0) echo "#"; else echo $commentUrl ?>">
                        <i class="fa fa-comments"></i>
                        <?
                        if ($unseenCommentCount > 0) {
                            ?>
                            <span class="badge badge-danger"><? echo $unseenCommentCount ?></span>
                            <?
                        }
                        ?>

                    </a>
                    <?
                    if ($unseenCommentCount > 0) {
                        ?>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">You have <? echo $unseenCommentCount ?> new comments</p>
                            </li>
                            <li>
                                <a href="<? echo $commentUrl ?>">See all comments</a>
                            </li>
                        </ul>

                        <?
                    }
                    ?>

                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">

                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" style="height: 25px;width:25px " src="<? echo $imageUrl ?>">
                        <span class="username"> <? echo $user_name ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="<? echo $userUrl ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="<? echo $settingUrl ?>"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="<? echo $commentUrl ?>"><i class="fa fa-comments"></i> Comments</a></li>
                        <li><a href="<? echo $logoutUrl ?>"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>

                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a class="deactive" href="<? echo $dashboardUrl ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>Article</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<? echo $articlesUrl ?>">Articles</a></li>
                        <li><a href="<? echo $newArticlesUrl ?>">New Article</a></li>

                    </ul>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list-alt"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<? echo $categoriesUrl ?>">Categories</a></li>
                        <li><a href="<? echo $newCategoryUrl ?>">New Category</a></li>
                    </ul>
                </li>

                <li>
                    <a class="deactive" href="<? echo $commentUrl ?>">
                        <i class="fa fa-comments"></i>
                        <span>Comment</span>
                    </a>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-align-justify"></i>
                        <span>Menus</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<? echo $menusUrl ?>">Menus</a></li>
                        <li><a href="<? echo $newMenuUrl ?>">New Menu</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<? echo $usersUrl ?>">Users</a></li>
                        <li><a href="<? echo $newUserUrl ?>">New user</a></li>

                    </ul>
                </li>

                <li>
                    <a class="deactive" href="<? echo $settingUrl ?>">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>


            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->

