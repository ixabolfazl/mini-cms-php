<?php

namespace Admin;
require_once("Admin.class.php");


class Article extends Admin
{


    public function index()
    {

        $this->title("Articles");
        $sql = 'SELECT articles.*,(SELECT username FROM users WHERE users.id= articles.user_id ) AS username ,(SELECT name FROM categories WHERE categories.id= articles.cat_id ) AS category FROM `articles` ORDER BY `created_at` DESC ;';
        $articles = $this->dataBase->select($sql);
        $this->view("admin.articles.index", compact("articles"));


    }

    public function show($id)
    {

        $sql = "SELECT *,(SELECT name FROM categories WHERE categories.id= articles.cat_id ) AS category FROM `articles` WHERE `id`= ?";
        $article = $this->dataBase->select($sql, [$id])->fetch();
        $this->title($article['title']);
        $this->view("admin.articles.show", compact("article"));


    }

    public function create()
    {
        $this->title("New Article");
        $sql = "SELECT * FROM `categories` WHERE `status`= ? ORDER BY `id` DESC ; ";
        $categories = $this->dataBase->select($sql, ["enable"]);
        $this->view("admin.articles.create", compact("categories"));

    }

    public function store($request)
    {

        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        }
        if ($request['cat_id'] != null) {
            $request['image'] = $this->saveImage($request['image'], 'article');
            if ($request['image']) {
                $request = array_merge($request, array('user_id' => $this->userId));
                $this->dataBase->insert('articles', array_keys($request), $request);
                $this->redirect('article');
            } else {
                $this->redirectBack();
            }
        } else {
            $this->redirectBack();
        }
    }


    public function edit($id)
    {

        $sql = "SELECT * FROM `categories` WHERE  `status`= ?  ORDER BY `id` DESC ; ";
        $categories = $this->dataBase->select($sql, ['enable']);

        $sql = "SELECT * FROM `articles` WHERE `id`= ?";
        $article = $this->dataBase->select($sql, [$id])->fetch();
        $this->title("Edit " . $article['title']);
        $this->view("admin.articles.edit", compact("categories", "article"));


    }

    public function update($request, $id)
    {

        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }


        if ($request['cat_id'] != null) {
            $request['image'] = $this->saveImage($request['image'], 'article');
            if (!$request['image']) {
                unset($request['image']);
            } else {
                $sql = "SELECT * FROM `articles` WHERE `id`= ?";
                $article = $this->dataBase->select($sql, [$id])->fetch();
                $this->removeImage($article['image']);
            }

            $request = array_merge($request, ['user_id' => $this->userId]);
            $this->dataBase->update('articles', $id, array_keys($request), $request);
            $this->redirect('article');

        } else {
            $this->redirectBack();
        }


    }

    public function delete($id)
    {
        $sql = "SELECT * FROM `articles` WHERE `id`= ?";
        $article = $this->dataBase->select($sql, [$id])->fetch();
        $this->removeImage($article['image']);
        $this->dataBase->delete('articles', $id);
        $this->redirectBack();
    }

    public function enable($id)
    {
        $sql = "SELECT * FROM `articles` WHERE `id`= ?";
        $article = $this->dataBase->select($sql, [$id])->fetch();
        if ($article['status'] == 'enable') {
            $this->dataBase->update('articles', $id, ['status'], ['disable']);
        } else {
            $this->dataBase->update('articles', $id, ['status'], ['enable']);
        }
        $this->redirectBack();
    }


}




