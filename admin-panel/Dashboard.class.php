<?php


namespace Admin;
require_once(realpath(dirname(__FILE__)) . "/Admin.class.php");


class Dashboard extends Admin
{

    public function index()
    {

        $this->title("Dashboard");

        $articleCountSql = "SELECT COUNT(*) AS count FROM `articles` ";
        $articleCount = $this->dataBase->select($articleCountSql)->fetch()['count'];
        $commentCountSql = "SELECT COUNT(*) AS count FROM `comments` ";
        $commentCount = $this->dataBase->select($commentCountSql)->fetch()['count'];
        $userCountSql = "SELECT COUNT(*)AS count FROM `users` ";
        $userCount = $this->dataBase->select($userCountSql)->fetch()['count'];
        $viewCountSql = "SELECT SUM(view)AS count FROM `articles` ";
        $viewCount = $this->dataBase->select($viewCountSql)->fetch()['count'];


        $recentArticlesSql = "SELECT * FROM articles ORDER BY `created_at` DESC LIMIT 7";
        $recentArticles = $this->dataBase->select($recentArticlesSql)->fetchAll();

        $mostViewArticlesSql = "SELECT * FROM articles ORDER BY `view` DESC LIMIT 7";
        $mostViewArticles = $this->dataBase->select($mostViewArticlesSql)->fetchAll();

        $mostCommentArticlesSql = "SELECT articles.* , (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS `comment_count` FROM articles ORDER BY `comment_count` DESC LIMIT 7";
        $mostCommentArticles = $this->dataBase->select($mostCommentArticlesSql)->fetchAll();


        $this->view("admin.dashboard.index", compact(
            "articleCount",
            "commentCount",
            "userCount",
            "viewCount",
            "recentArticles",
            "mostViewArticles",
            "mostCommentArticles"

        ));

    }

}
