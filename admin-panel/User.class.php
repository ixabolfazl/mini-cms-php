<?php

namespace Admin;
require_once(realpath(dirname(__FILE__)) . '/Admin.class.php');

class User extends Admin
{


    public function index()
    {

        $this->title("Users");
        $sql = "SELECT * FROM `users` ORDER BY `id`; ";
        $users = $this->dataBase->select($sql);
        $this->view("admin.users.index",compact("users"));

    }

    public function create()
    {
        $this->title("New User");
        $this->view("admin.users.create");


    }

    public function store($request)
    {

        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }
        $request['image'] = $this->saveImage($request['image'], 'users');
        if (!$request['image']) {
            unset($request['image']);
        }

        $request['password']=password_hash( $request['password'],PASSWORD_DEFAULT);

        $this->dataBase->insert('users', array_keys($request), $request);
        $this->redirect('users');
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id`= ? ;";
        $user = $this->dataBase->select($sql, [$id])->fetch();
        $this->title("Edit " . $user['username']);
        $this->view("admin.users.edit",compact("user"));

    }

    public function update($request, $id)
    {

        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }

        if(isset($request['password'])){
            $request['password']=password_hash( $request['password'],PASSWORD_DEFAULT);
        }
        else{
            unset($request['password']);
        }
        $request['image'] = $this->saveImage($request['image'], 'users');
        if (!$request['image']) {
            unset($request['image']);
        }
        $this->dataBase->update('users', $id, array_keys($request), $request);
        $this->redirect('users');
    }

    public function delete($id)
    {

        $sql = "SELECT * FROM `users` WHERE `id`= ?";
        $user = $this->dataBase->select($sql, [$id])->fetch();
        $this->removeImage($user['image']);
        $this->dataBase->delete('users', $id);
        $this->redirect('users');

    }

    public function enable($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id`= ?";
        $user = $this->dataBase->select($sql, [$id])->fetch();
        if ($user['status'] == 'enable') {
            $this->dataBase->update('users', $id, ['status'], ['disable']);
        } else {
            $this->dataBase->update('users', $id, ['status'], ['enable']);
        }
        $this->redirectBack();
    }

    public function permission($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id`= ?";
        $user = $this->dataBase->select($sql, [$id])->fetch();
        if ($user['permission'] == 'admin') {
            $this->dataBase->update('users', $id, ['permission'], ['user']);
        } else {
            $this->dataBase->update('users', $id, ['permission'], ['admin']);
        }
        $this->redirectBack();
    }

}