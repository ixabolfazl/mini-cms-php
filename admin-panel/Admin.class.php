<?php

namespace Admin;
require_once(realpath(dirname(__FILE__)) . '/DataBase.php');
require_once(realpath(dirname(__FILE__)) . '/Auth.class.php');


use DataBase\DataBase;


class Admin
{

    public function __construct()
    {
        $this->dataBase = new DataBase();
        $auth = new Auth();
        $auth->checkAdmin();
        $this->userId = $_SESSION['user'];


        $sql = "SELECT * FROM `setting`;";
        $this->setting = $this->dataBase->select($sql)->fetch();

        $sql = "SELECT * FROM `users` WHERE id = ?";
        $this->user = $this->dataBase->select($sql, [$this->userId])->fetch();

        $unseenCommentCountSql = "SELECT COUNT(*)AS count FROM comments WHERE comments.status = 'unseen'";
        $this->unseenCommentCount = $this->dataBase->select($unseenCommentCountSql)->fetch()['count'];

    }


    protected function title($title)
    {
        $this->title = $title . " | " . $this->setting['title'];

    }


    protected function redirect($url){
        header("Location: ". trim($this->currentDomain, '/ ') . '/panel/' . trim($url, '/ '));
        exit();
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }


    protected function saveImage($image, $imagePath, $imageName = null)
    {

        $validTypes = ['image/jpeg', 'image/png'];
        $validExts = ['jpg', 'jpeg', 'png'];
        $tempName = $image['tmp_name'];
        $file_Ex = substr($image['name'], strrpos($image['name'], '.') + 1);
        $file_Ex = strtolower($file_Ex);
        $fInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($fInfo, $tempName);

        if (in_array($mime, $validTypes) && in_array($file_Ex, $validExts)) {

            if ($imageName)
                $imageName = $imageName . "." . $file_Ex;
            else
                $imageName = date('Y-m-d-H-i-s') . "." . $file_Ex;

            $imagePath = "public/photos/" . $imagePath . "/";

            if (is_uploaded_file($tempName)) {
                if (move_uploaded_file($tempName, $imagePath . $imageName)) {
                    return $imagePath . $imageName;
                } else {
                    return false;
                }
            } else {
                return false;
            }


        } else {
            return false;
        }


    }


    protected function removeImage($path){
        $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
        unlink($path);
    }


    protected function userPosts($id)
    {

        $sql = 'SELECT * FROM `articles` WHERE `user_id`=? ;';
        return $this->dataBase->select($sql, [$id])->rowCount();

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
