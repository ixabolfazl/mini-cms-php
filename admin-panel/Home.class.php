<?php


namespace Admin;

require_once(realpath(dirname(__FILE__)) . '/DataBase.php');
require_once(realpath(dirname(__FILE__)) . '/Auth.class.php');

use DataBase\DataBase;

class Home
{


    public function index()
    {

        $this->view("app.index");


    }

    public function category($id)
    {
        $categorySql = "SELECT * FROM `categories` WHERE `id`=?";
        $category = $this->dataBase->select($categorySql, [$id])->fetch();
        $categoryArticlesSql = "SELECT articles.* , (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comment_count ,(SELECT name FROM users WHERE users.id = articles.user_id) AS author  FROM articles WHERE `status` = 'enable' AND `cat_id`= ? ORDER BY `created_at` DESC";
        $categoryArticles = $this->dataBase->select($categoryArticlesSql, [$id])->fetchAll();
        $this->view("app.show-category", compact(
            "category",
            "categoryArticles"
        ));

    }

    public function show($id)
    {

        $articleSql = "SELECT articles.* , (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id and `status` = 'approved') AS comment_count ,(SELECT name FROM users WHERE users.id = articles.user_id) AS author ,(SELECT name FROM categories WHERE categories.id = articles.cat_id) AS category FROM articles WHERE `id` =  ? ";
        $article = $this->dataBase->select($articleSql, [$id])->fetch();

        $this->dataBase->update('articles', $id, ['view'], [$article['view'] + 1]);

        $userSql = "SELECT * FROM `users` WHERE id = ? ";
        $user = $this->dataBase->select($userSql, [$article['user_id']])->fetch();

        $categoryArticlesSql = "SELECT articles.* ,(SELECT name FROM users WHERE users.id = articles.user_id) AS author  FROM articles WHERE `cat_id` =  ? ORDER BY `view` DESC ";;
        $categoryArticles = $this->dataBase->select($categoryArticlesSql, [$article['cat_id']])->fetchAll();

        $commentsSql = "SELECT *,( SELECT `username` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) as `username` ,( SELECT `image` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) as `image` FROM `comments` WHERE `article_id` = ? and `status` = 'approved' ORDER BY `created_at` DESC ";
        $comments = $this->dataBase->select($commentsSql, [$id])->fetchAll();


        $previousArticleSql = "SELECT * FROM `articles` WHERE id < ? ORDER BY id DESC LIMIT 1";
        $previousArticle = $this->dataBase->select($previousArticleSql, [$id])->fetch();

        $nextArticleSql = 'SELECT * FROM `articles` WHERE id > ? ORDER BY id ASC LIMIT 1';

        $nextArticle = $this->dataBase->select($nextArticleSql, [$id])->fetch();


        $this->view("app.show-article", compact(
            "article",
            "user",
            "categoryArticles",
            "comments",
            "previousArticle",
            "nextArticle",
        ));

    }

    public function commentStore($request)
    {

        if (isset($_SESSION['user']) and $_SESSION['user'] != Null) {
            $this->dataBase->insert('comments', ['user_id', 'article_id', 'comment'], [$_SESSION['user'], $request['article_id'], $request['comment']]);
            $this->redirectBack();
        } else {
            $this->redirectBack();
        }

    }

    public function showUser($id)
    {
        $userSql = "SELECT * FROM `users` WHERE `id`=?";
        $mainUser = $this->dataBase->select($userSql, [$id])->fetch();
        $ArticlesSql = "SELECT articles.* , (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comment_count ,(SELECT name FROM categories WHERE categories.id= articles.cat_id ) AS category,(SELECT name FROM users WHERE users.id = articles.user_id) AS author  FROM articles WHERE `status` = 'enable' AND `user_id`= ? ORDER BY `created_at` DESC";
        $Articles = $this->dataBase->select($ArticlesSql, [$id])->fetchAll();


        $this->view("app.show-user", compact(
            "mainUser",
            "Articles"
        ));


    }


    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);

    }

    function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }


        $auth = new Auth();
        $auth->checkSet_UserId();
        if (isset($_SESSION['user'])) {
            $this->userId = $_SESSION['user'];
        }


        $this->dataBase = new DataBase();


        $recentArticleSql = "SELECT articles.* , (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comment_count ,(SELECT name FROM users WHERE users.id = articles.user_id) AS author ,(SELECT name FROM categories WHERE categories.id = articles.cat_id) AS category FROM articles WHERE `status` = 'enable' ORDER BY `created_at` DESC";
        $this->recentArticles = $this->dataBase->select($recentArticleSql)->fetchAll();

        $popularArticleSql = "SELECT articles.*  ,(SELECT name FROM users WHERE users.id = articles.user_id) AS author ,(SELECT name FROM categories WHERE categories.id = articles.cat_id) AS category FROM articles WHERE `status` = 'enable' ORDER BY `view` DESC";
        $this->popularArticles = $this->dataBase->select($popularArticleSql)->fetchAll();

        $categoriesSql = "SELECT *,(SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id and articles.status = 'enable'  ) AS `article_count` FROM `categories`  WHERE  `status` = 'enable' ORDER BY `created_at` DESC";
        $this->categories = $this->dataBase->select($categoriesSql)->fetchAll();

        $menusSql = "SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id` AND `submenus`.`status` = 'enable' ) AS  `submenus_count` FROM `menus` WHERE `parent_id` IS NULL AND `status` = 'enable' ";
        $this->menus = $this->dataBase->select($menusSql)->fetchAll();

        $subMenusSql = "SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL AND `status` = 'enable' ";
        $this->subMenus = $this->dataBase->select($subMenusSql)->fetchAll();

        $settingSql = "SELECT * FROM `setting`;";
        $this->setting = $this->dataBase->select($settingSql)->fetch();

    }

    protected function view($dir, $vars = null)
    {

        $dir = str_replace(".", "/", $dir);
        if ($vars) {
            extract($vars);
        }
        $path = realpath(dirname(__FILE__) . "/../template/" . $dir . ".php");
        if (file_exists($path)) {
            return require_once($path);
        } else {
            echo "this view [\"" . $dir . "\"] not exist!";
        }
    }
}