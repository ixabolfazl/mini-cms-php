<?php

namespace Admin;
require_once("Jwt.class.php");
require_once('DataBase.php');

use DataBase\DataBase;

class Auth
{

    protected function title($title)
    {
        $this->title = $title . " | " . $this->setting['title'];

    }


    protected function redirect($url){
        header("Location: ". trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
        exit();
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }


    public function login()
    {
        $this->title("Login");
        if (isset($_SESSION['user'])) {
            $this->redirect('panel');
        }
        $this->view("admin.auth.login");

    }

    public function register()
    {
        $this->title("Register");
        if (isset($_SESSION['user'])) {
            $this->redirect('panel');
        }
        $this->view("admin.auth.register");

    }

    public function checkSet_UserId()
    {
        if (isset($_SESSION['user'])) {
            $this->userId = $_SESSION['user'];
            return true;
        } elseif (isset($_COOKIE['authorization'])) {

            if (!$this->jwt->verify($_COOKIE['authorization'])) {
                $this->logout();
            } else {
                $this->userId = $_SESSION['user'];
                $this->userId = $this->jwt->decode($_COOKIE['authorization'])['userid'];
                $_SESSION['user'] = $this->userId;
                return true;
            }

        }

    }

    public function checkLogin($request)
    {

        $username = $request['username'];
        $password = $request['password'];


        if (empty($username) || empty($password)) {

            $this->redirectBack();

        } else {

            $sql = "SELECT * FROM `users` WHERE `username`= ? ;";
            $user = $this->dataBase->select($sql, [$username])->fetch();


            if ($user == null) {

                $this->redirectBack();
            } else {
                if (password_verify($password, $user['password'])) {
                    if (isset($request['remember'])) {


                        $_SESSION['user'] = $user['id'];
                        setcookie("authorization", $this->jwt->encode($user['id'], true), time() + $this->jwt->extended_exp);
                        $this->redirect("panel/admin");


                    } else {
                        $_SESSION['user'] = $user['id'];
                        $this->redirect("panel/admin");
                    }
                } else {

                    $this->redirectBack();
                }


            }

        }

    }

    public function registerStore($request)
    {

        $name = $request['name'];
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $rePassword = $request['repassword'];
        unset($request['repassword']);
        unset($request['remember']);

        if (empty($name) || empty($username) || empty($email) || empty($password) || empty($rePassword)) {

            $this->redirectBack();
        } elseif ($password != $rePassword) {
            $this->redirectBack();
        } elseif (strlen($password) <= 8) {
            $this->redirectBack();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirectBack();
        } else {

            $sql = "SELECT * FROM `users` WHERE `username`= ? ;";
            $user = $this->dataBase->select($sql, [$username])->fetch();


            if ($user != null) {

                $this->redirectBack();
            } else {
                $request['password'] = $this->hash($password);

                $this->dataBase->insert('users', array_keys($request), $request);
                $this->redirect('login');
            }


        }

    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        setcookie("authorization", " ", time() - 3600);

        $this->redirect('home');
    }


    public function checkAdmin()
    {
        if (!$this->checkSet_UserId()) {
            $this->redirect('home');
        }
        $sql = "SELECT * FROM `users` WHERE `id`= ? ;";
        $user = $this->dataBase->select($sql, [$this->userId])->fetch();

        if ($user != null) {
            $userPermission = $user['permission'];

            if ($userPermission != "admin") {
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }


    }


    public function hash($password)
    {

        return password_hash($password, PASSWORD_DEFAULT);
    }

    protected function view($dir)
    {

        $dir = str_replace(".", "/", $dir);
        $path = realpath(dirname(__FILE__) . "/../template/" . $dir . ".php");
        if (file_exists($path)) {
            return require_once($path);
        } else {
            echo "this view [\"" . $dir . "\"] not exist!";
        }


    }

    function __construct()
    {

        $this->jwt = new JWT();
        $this->dataBase = new DataBase();

        $this->checkSet_UserId();

        $this->currentDomain = BASE_URL;

        $sql = "SELECT * FROM `setting`;";
        $this->setting = $this->dataBase->select($sql)->fetch();

    }


}

?>





