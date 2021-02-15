<?php

namespace Admin;
require_once('Admin.class.php');

class Menu extends Admin
{


    public function index()
    {
        $this->title("Menus");
        $sql = "SELECT *,(SELECT name FROM menus as menus2  WHERE menus2.id= menus.parent_id ) AS parent FROM `menus` ORDER BY `id` DESC ;";
        $menus = $this->dataBase->select($sql);
        $this->view("admin.menus.index",compact("menus"));



    }


    public function create()
    {
        $this->title("New Menu");
        $sql = "SELECT * FROM `menus` WHERE  `parent_id` IS NULL AND `status`=? ORDER BY `id` DESC ;";
        $menus = $this->dataBase->select($sql, ['enable']);
        $this->view("admin.menus.create",compact("menus"));

    }

    public function store($request)
    {
        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }
        if ($request['parent_id'] == 'Null') {
            $request['parent_id'] =NUll;
        }



        $this->dataBase->insert('menus', array_keys($request), $request);
        $this->redirect('menu');
    }

    public function edit($id)
    {
        $sql = 'SELECT * FROM `menus` WHERE `id`=? ;';
        $menu = $this->dataBase->select($sql, [$id])->fetch();
        $this->title("Edit ".$menu['name']);
        $sql = "SELECT * FROM `menus` WHERE  `parent_id` IS NULL AND `status`=? AND `id`!=? ORDER BY `id` DESC ;";
        $parentMenus = $this->dataBase->select($sql, ['enable', $id]);
        $this->view("admin.menus.edit",compact("menu","parentMenus"));


    }

    public function update($request, $id)
    {

        if ($request['status'] == 'on') {
            $request['status'] = 'enable';
        } else {
            $request['status'] = 'disable';
        }
        if ($request['parent_id'] == 'Null') {
            $request['parent_id'] =NUll;
        }
        $this->dataBase->update('menus', $id, array_keys($request), $request);
        $this->redirect('menu');

    }

    public function delete($id)
    {
        $this->dataBase->delete('menus', $id);
        $this->redirect('menu');

    }

    public function enable($id)
    {
        $sql = "SELECT * FROM `menus` WHERE `id`= ?";
        $menu = $this->dataBase->select($sql, [$id])->fetch();
        if ($menu['status'] == 'enable') {
            $this->dataBase->update('menus', $id, ['status'], ['disable']);
        } else {
            $this->dataBase->update('menus', $id, ['status'], ['enable']);
        }
        $this->redirectBack();
    }
}
