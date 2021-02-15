<?php

namespace Admin;
require_once('Admin.class.php');

class Comment extends Admin
{

    public function index()
    {
        $this->title("Comments");
        $sql = "SELECT *,( SELECT `username` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) as `username` ,( SELECT `title` FROM `articles` WHERE `articles`.`id` = `comments`.`article_id`) as `article` FROM `comments` ORDER BY `id` DESC";
        $comments = $this->dataBase->select($sql)->fetchAll();
        foreach ($comments as $comment) {
            if ($comment['status'] == 'unseen') {
                $this->dataBase->update('comments', $comment['id'], ['status'], ['seen']);
            }

        }
        $this->view("admin.comments.index", compact("comments"));


    }

    public function show($id)
    {
        $this->title("Comment");
        $sql = "SELECT *,( SELECT `username` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) as `username` ,( SELECT `title` FROM `articles` WHERE `articles`.`id` = `comments`.`article_id`) as `article` FROM `comments` WHERE id = ? ORDER BY `id` DESC";
        $comment = $this->dataBase->select($sql, [$id])->fetch();
        $this->view("admin.comments.show", compact("comment"));

    }

    public function edit($id)
    {
        $this->title("Edit Comment");
        $sql = "SELECT *,( SELECT `username` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) as `username` ,( SELECT `title` FROM `articles` WHERE `articles`.`id` = `comments`.`article_id`) as `article` FROM `comments` WHERE id = ? ORDER BY `id` DESC";
        $comment = $this->dataBase->select($sql, [$id])->fetch();
        $this->view("admin.comments.edit", compact("comment"));

    }


    public function update($request, $id)
    {
        if ($request['status'] == 'on') {
            $request['status'] = 'approved';
        } else {
            $request['status'] = 'seen';
        }
        $this->dataBase->update('comments', $id, array_keys($request), $request);
        $this->redirect('comment');
    }

    public function delete($id)
    {

        $this->dataBase->delete('comments', $id);
        $this->redirect('comment');

    }

    public function status($id)
    {
        $sql = "SELECT * FROM `comments` WHERE `id`= ?";
        $comment = $this->dataBase->select($sql, [$id])->fetch();
        if ($comment['status'] == 'approved') {
            $this->dataBase->update('comments', $id, ['status'], ['seen']);
        } else {
            $this->dataBase->update('comments', $id, ['status'], ['approved']);
        }
        $this->redirectBack();

    }

}
