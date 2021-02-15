<?php

namespace Admin;
require_once (realpath(dirname(__FILE__)).'/Admin.class.php');

class Setting extends Admin{

    public function index()
    {
        $this->title("Setting");
        $sql="SELECT * FROM `setting`;";
        $setting= $this->dataBase->select($sql)->fetch();
        $this->view("admin.setting.index",compact("setting"));


    }

    public function update($request)
    {
        $this->title("Update Setting");
        $sql="SELECT * FROM `setting` ;";
        $setting= $this->dataBase->select($sql)->fetch();

        $request['logo'] = $this->saveImage($request['logo'], 'setting','logo');
        if (!$request['logo']) {
            unset($request['logo']);
        }
        $request['icon'] = $this->saveImage($request['icon'], 'setting','icon');
        if (!$request['icon']) {
            unset($request['icon']);
        }
        if($setting!= null){
            $this->dataBase->update('setting', $setting['id'], array_keys($request), $request);
        }
        else{
            $this->dataBase->insert('setting',  array_keys($request), $request);
        }
        $this->redirect('setting');


        
    }
    
    
}