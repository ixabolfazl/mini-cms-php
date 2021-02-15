<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php

        if ($title == "") {
            echo $mainTitle;
        } else {
            echo $title . " | " . $mainTitle;
        }

        ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<? asset("app/layouts/css/bootstrap.min.css") ?>"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<? asset("app/layouts/css/font-awesome.min.css") ?>">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<? asset("app/layouts/css/style.css") ?>"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- HEADER -->
<header class="post-" id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->
                <ul class="nav-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="<? echo $url ?>" class="logo"><img src="<?php echo $iconUrl ?>" alt="<?php echo $title ?>"></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li><a href="<?php echo url("home") ?>">Home</a></li>
                    <?php
                    foreach ($this->menus as $menu) {

                        $menuId = $menu['id'];
                        $menuName = $menu['name'];
                        $menuUrl = $menu['url'];
                        $menuParent_id = $menu['parent_id'];
                        $menuSubmenus_count = $menu['submenus_count'];

                        if ($menuSubmenus_count == 0) {

                            ?>
                            <li><a href="<?php echo $menuUrl ?>"><?php echo $menuName ?></a></li>
                            <?

                        } else {

                            ?>
                            <li class="has-dropdown">
                                <a href="<?php echo $menuUrl ?>"><?php echo $menuName ?></a>
                                <div class="dropdown">
                                    <div class="dropdown-body">
                                        <ul class="dropdown-list">

                                            <?
                                            foreach ($this->subMenus as $subMenu) {

                                                $submenuName = $subMenu['name'];
                                                $submenuUrl = $subMenu['url'];
                                                $submenuParent_id = $subMenu['parent_id'];

                                                if ($menuId == $submenuParent_id) {

                                                    ?>

                                                    <li>
                                                        <a href="<?php echo $submenuUrl ?>"><?php echo $submenuName ?></a>
                                                    </li>

                                                    <?
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?


                        }

                        ?>


                        <?php
                    }
                    if (isset($_SESSION['user'])) {

                        ?>
                        <li><a href="<?php echo url("logout") ?>">Logout</a></li>
                        <?

                    } else {
                        ?>
                        <li><a href="<?php echo url("login") ?>">Login</a></li>
                        <li><a href="<?php echo url("register") ?>">Register</a></li>
                        <?
                    }
                    ?>

                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                <li><a href="<?php echo url("home") ?>">Home</a></li>
                <?php
                foreach ($this->menus as $menu) {

                    $menuId = $menu['id'];
                    $menuName = $menu['name'];
                    $menuUrl = $menu['name'];
                    $menuParent_id = $menu['parent_id'];
                    $menuSubmenus_count = $menu['submenus_count'];

                    if ($menuSubmenus_count == 0) {

                        ?>
                        <li><a href="<?php echo $menuUrl ?>"><?php echo $menuName ?></a></li>
                        <?

                    } else {

                        ?>
                        <li class="has-dropdown"><a><?php echo $menuName ?></a>
                            <ul class="dropdown">

                                <?
                                foreach ($this->subMenus as $subMenu) {

                                    $submenuName = $subMenu['name'];
                                    $submenuUrl = $subMenu['url'];
                                    $submenuParent_id = $subMenu['parent_id'];

                                    if ($menuId == $submenuParent_id) {

                                        ?>

                                        <li><a href="<?php echo $submenuUrl ?>"><?php echo $submenuName ?></a></li>

                                        <?
                                    }
                                }
                                ?>
                            </ul>

                        </li>
                        <?


                    }


                    if (isset($_SESSION['user'])) {

                        ?>
                        <li><a href="<?php echo url("logout") ?>">Logout</a></li>
                        <?

                    } else {
                        ?>
                        <li><a href="<?php echo url("login") ?>">Login</a></li>
                        <li><a href="<?php echo url("register") ?>">Register</a></li>
                        <?
                    }


                }
                ?>


            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->

