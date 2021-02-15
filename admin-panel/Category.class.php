<?php

namespace Admin;
require_once('Admin.class.php');


class Category extends Admin
{


    public function index()
    {
        $this->title("Categories");
        $sql = "SELECT categories.* , (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS `count` FROM categories ORDER BY `id` DESC";
        $categories = $this->dataBase->select($sql);
        $this->view("admin.categories.index", compact("categories"));
    }

    public function show($id)
    {

        $categorySql = "SELECT * FROM `categories` WHERE `id`=?";
        $category = $this->dataBase->select($categorySql, [$id])->fetch();
        $this->title($category['name']);
        $articlesSql = 'SELECT articles.*,(SELECT username FROM users WHERE users.id= articles.user_id ) AS username ,(SELECT name FROM categories WHERE categories.id= articles.cat_id ) AS category FROM `articles` WHERE cat_id=? ORDER BY `created_at` DESC ;';
        $articles = $this->dataBase->select($articlesSql, [$id])->fetchAll();
        $this->view("admin.categories.show", compact("category", "articles"));


    }

    public function create()
    {
        $this->title("New Category");
        $this->view("admin.categories.create");


    }

    public function store($request)
    {

        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }
        $this->dataBase->insert('categories', array_keys($request), $request);
        $this->redirect('category');

    }

    public function edit($id)
    {


        $sql = "SELECT * FROM `categories` WHERE `id`= ? ;";
        $category = $this->dataBase->select($sql, [$id])->fetch();
        $this->title("Edit " . $category['name']);
        $this->view("admin.categories.edit", compact("category"));


    }

    public function update($request, $id)
    {
        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }
        $this->dataBase->update('categories', $id, array_keys($request), $request);
        $this->redirect('category');
    }

    public function delete($id)
    {

        $this->dataBase->delete('categories', $id);
        $this->redirect('category');

    }

    public function enable($id)
    {
        $sql = "SELECT * FROM `categories` WHERE `id`= ?";
        $article = $this->dataBase->select($sql, [$id])->fetch();
        if ($article['status'] == 'enable') {
            $this->dataBase->update('categories', $id, ['status'], ['disable']);
        } else {
            $this->dataBase->update('categories', $id, ['status'], ['enable']);
        }
        $this->redirectBack();
    }


}
