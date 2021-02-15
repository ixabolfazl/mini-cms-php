<?php
require_once("admin-panel/CreateDB.php");
require_once "config.php";

use DataBase\CreateDB;


$user = [
    //name
    'name' => 'user',
    //username
    'username' => 'admin',
    //email
    'email' => 'sampel@gmail.com',
    //password
    'password' => '987654321',
    //permission
    'permission' => 'admin',
    //about
    'about' => 'Every breath we surrender will turn back the death that continues to inflict on us',
];
$setting = [
    //title
    'title' => 'Mini cms',
    //description
    'description' => "It's not true that the more you love the better you understand.",
    //about
    'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    //keywords
    'keywords' => 'mini,cms',
    //logo
    'logo' => 'public/photos/setting/logo.png',
    //icon
    'icon' => 'public/photos/setting/icon.png',
];

$run = new CreateDB();
$run->run($user, $setting);

header("location: " . BASE_URL);