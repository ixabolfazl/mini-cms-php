<?php

session_start();

require_once "config.php";
define("CURRENT_DOMAIN", currentDomain() . "/");
//load files
require_once("admin-panel/Category.class.php");
require_once("admin-panel/Article.class.php");
require_once("admin-panel/Dashboard.class.php");
require_once("admin-panel/Menu.class.php");
require_once("admin-panel/Setting.class.php");
require_once("admin-panel/User.class.php");
require_once("admin-panel/Auth.class.php");
require_once("admin-panel/Comment.class.php");
require_once("admin-panel/Home.class.php");

use Admin\Admin;
use Admin\Category;
use Admin\Dashboard;
use Admin\Article;
use Admin\Menu;
use Admin\Auth;
use Admin\Home;
use Admin\Comment;


function asset($src)
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $src = $domain . '/' . BASE_FOLDER . "/template/" . trim($src, '/ ');
    echo $src;
}

function url($url)
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $url = $domain . '/' . BASE_FOLDER . "/" . ltrim($url, '/ ');
    return $url;
}

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}

function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}


function uri($uri, $class, $method, $requestMethod = 'GET')
{

    $values = [];

    $subURIs = explode('/', $uri);
    $request_uri = array_slice(explode('/', $_SERVER['REQUEST_URI']), 2);

    if ($request_uri[0] == "" or $request_uri[0] == "/") {

        $request_uri[0] = 'home';

    }

    $break = false;

    if (count($request_uri) == count($subURIs) and $_SERVER['REQUEST_METHOD'] == $requestMethod) {

        foreach (array_combine($subURIs, $request_uri) as $subURI => $request) {

            if ($subURI[0] == '{' and $subURI[strlen($subURI) - 1] == '}') {

                array_push($values, $request);

            } else {

                if ($subURI != $request) {

                    $break = true;
                    break;

                }

            }

        }

    } else {
        $break = true;
    }

    if (!$break) {

        $class = 'Admin\\' . $class;
        $object = new $class;

        if (count($values) > 0) {

            if ($requestMethod == 'POST') {

                if (isset($_FILES)) {

                    $request = array_merge($_POST, $_FILES);
                    $object->$method($request, implode(',', $values));

                } else {

                    $object->$method($_POST, implode(',', $values));

                }

            } else {

                $object->$method(implode(',', $values));
            }

        } else {

            if ($requestMethod == 'POST') {

                if (isset($_FILES)) {

                    $request = array_merge($_POST, $_FILES);
                    $object->$method($request);

                } else {

                    $object->$method($_POST);

                }

            } else {

                $object->$method();

            }


        }


    } else {


    }


}

//admin
uri('panel/admin', 'Dashboard', 'index');

//category
uri('panel/category', 'Category', 'index');
uri('panel/category/show/{id}', 'Category', 'show');
uri('panel/category/create', 'Category', 'create');
uri('panel/category/store', 'Category', 'store', 'POST');
uri('panel/category/edit/{id}', 'Category', 'edit');
uri('panel/category/update/{id}', 'Category', 'update', 'POST');
uri('panel/category/delete/{id}', 'Category', 'delete');
uri('panel/category/enable/{id}', 'Category', 'enable');


//article
uri('panel/article', 'Article', 'index');
uri('panel/article/show/{id}', 'Article', 'show');
uri('panel/article/create', 'Article', 'create');
uri('panel/article/store', 'Article', 'store', 'POST');
uri('panel/article/edit/{id}', 'Article', 'edit');
uri('panel/article/update/{id}', 'Article', 'update', 'POST');
uri('panel/article/delete/{id}', 'Article', 'delete');
uri('panel/article/enable/{id}', 'Article', 'enable');


//menu
uri('panel/menu', 'Menu', 'index');
uri('panel/menu/create', 'Menu', 'create');
uri('panel/menu/store', 'Menu', 'store', 'POST');
uri('panel/menu/edit/{id}', 'Menu', 'edit');
uri('panel/menu/update/{id}', 'Menu', 'update', 'POST');
uri('panel/menu/delete/{id}', 'Menu', 'delete');
uri('panel/menu/enable/{id}', 'Menu', 'enable');


//setting

uri('panel/setting', 'Setting', 'index');
uri('panel/setting/update', 'Setting', 'update', 'POST');


//users
uri('panel/users', 'User', 'index');
uri('panel/user/show/{id}', 'User', 'show');
uri('panel/user/create', 'User', 'create');
uri('panel/user/store', 'User', 'store', 'POST');
uri('panel/user/edit/{id}', 'User', 'edit');
uri('panel/user/update/{id}', 'User', 'update', 'POST');
uri('panel/user/delete/{id}', 'User', 'delete');
uri('panel/user/enable/{id}', 'User', 'enable');
uri('panel/user/permission/{id}', 'User', 'permission');


//comments
uri('panel/comment', 'Comment', 'index');
uri('panel/comment/edit/{id}', 'Comment', 'edit');
uri('panel/comment/show/{id}', 'Comment', 'show');
uri('panel/comment/update/{id}', 'Comment', 'update', 'POST');
uri('panel/comment/delete/{id}', 'Comment', 'delete');
uri('panel/comment/status/{id}', 'Comment', 'status');

//auth
uri('login', 'Auth', 'login');
uri('register', 'Auth', 'register');
uri('logout', 'Auth', 'logout');
uri('check-login', 'Auth', 'checkLogin', 'POST');
uri('register-store', 'Auth', 'registerStore', 'POST');

//home
uri('home', 'Home', 'index');
uri('show-article/{id}', 'Home', 'show');
uri('show-category/{id}', 'Home', 'category');
uri('show-user/{id}', 'Home', 'showUser');
uri('comment-store', 'Home', 'commentStore', 'POST');








