<?php

session_start();

require_once "config.php";

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
    $src = BASE_URL . "/template/" . trim($src, '/ ');
    echo $src;
}

function url($url)
{
    $url = BASE_URL . "/" . trim($url, '/ ');
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


function uri($reservedUrl,$class,$method,$requestMethod = 'GET'){

    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(BASE_URL, '', $currentUrl);
    $currentUrl = trim($currentUrl,'/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);





    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod) {
        return false;
    }

    //match
    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}')
        {
            array_push($parameters, $currentUrlArray[$key]);
        }
        elseif($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    //request parameter
    if(methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $class = "Admin\\" . $class;
    $object= new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();
}


//Routes


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
uri('/', 'Home', 'index');
uri('show-article/{id}', 'Home', 'show');
uri('show-category/{id}', 'Home', 'category');
uri('show-user/{id}', 'Home', 'showUser');
uri('comment-store', 'Home', 'commentStore', 'POST');








