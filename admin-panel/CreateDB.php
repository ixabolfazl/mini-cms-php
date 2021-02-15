<?php

namespace DataBase;

require_once('DataBase.php');

class CreateDB extends DataBase
{


    public function run($user, $setting)
    {
        $createTableQuerys =
            [
                "CREATE TABLE `categories`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL COLLATE utf8_persian_ci,
    `status` enum('disable','enable') NOT NULL   DEFAULT 'disable',
    `created_at` DATETIME NOT NULL ,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_persian_ci",

                "CREATE TABLE `users`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL COLLATE utf8_persian_ci,
    `username` VARCHAR(100) NOT NULL COLLATE utf8_persian_ci,
    `email` VARCHAR(100) NOT NULL COLLATE utf8_persian_ci,
    `password` VARCHAR(100) NOT NULL COLLATE utf8_persian_ci,
    `about` TEXT COLLATE utf8_persian_ci DEFAULT NULL,
    `image` VARCHAR(100) NOT NULL COLLATE utf8_persian_ci DEFAULT 'public/photos/users/default.png',
    `permission` enum('admin','user') NOT NULL DEFAULT 'user',
    `status` enum('disable','enable') NOT NULL DEFAULT 'enable',
    `created_at` DATETIME NOT NULL ,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_persian_ci",

                "CREATE TABLE `articles`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(250) NOT NULL COLLATE utf8_persian_ci,
    `summary` TEXT NOT NULL COLLATE utf8_persian_ci,
    `body` TEXT NOT NULL COLLATE utf8_persian_ci,
    `view` INT(11) NOT NULL DEFAULT 0,
    `user_id` INT(11) NOT NULL,
    `cat_id` INT(11) NOT NULL,
    `image` VARCHAR(250) NOT NULL COLLATE utf8_persian_ci,
    `status` enum('disable','enable') NOT NULL DEFAULT 'disable',
    `created_at` DATETIME NOT NULL ,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_persian_ci",

                "CREATE TABLE `comments`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `comment` TEXT NOT NULL COLLATE utf8_persian_ci,
    `article_id` INT(11) NOT NULL,
    `status` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
    `created_at` DATETIME NOT NULL ,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_persian_ci",

                "CREATE TABLE `setting`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` TEXT  COLLATE utf8_persian_ci DEFAULT NULL,
    `description` TEXT COLLATE utf8_persian_ci DEFAULT NULL,
    `about` TEXT COLLATE utf8_persian_ci DEFAULT NULL,
    `keywords` TEXT COLLATE utf8_persian_ci DEFAULT NULL,
    `logo` VARCHAR(250)  COLLATE utf8_persian_ci DEFAULT NULL,
    `icon` VARCHAR(250) COLLATE utf8_persian_ci DEFAULT NULL,
    `created_at` DATETIME NOT NULL ,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_persian_ci",

                "CREATE TABLE `menus`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL COLLATE utf8_persian_ci,
    `url` VARCHAR(300) NOT NULL COLLATE utf8_persian_ci,
    `parent_id` INT(11) DEFAULT NULL,
    `status` enum('disable','enable') NOT NULL   DEFAULT 'enable',
    `created_at` DATETIME NOT NULL ,
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_persian_ci",
            ];
        $menus = [
            [
                //name
                'name' => 'Home',
                //url
                'url' => BASE_URL,
                //parent menu
                'parent_id' => NUll,
            ],
            [
                //name
                'name' => 'Category',
                //url
                'url' => "#",
            ],
            [
                //name
                'name' => 'Login',
                //url
                'url' => BASE_URL . "/login",
            ],
            [
                //name
                'name' => 'Register',
                //url
                'url' => BASE_URL . "/register",
            ],
        ];

        foreach ($createTableQuerys as $createTableQuery) {

            $this->createTable($createTableQuery);

        }
        $tableInitializes = [
            ['table' => 'users',
                'fields' => ['name', 'username', 'email', 'password', 'permission'],
                'values' => [
                    $user['name'],
                    $user['username'],
                    $user['email'],
                    password_hash($user['password'], PASSWORD_DEFAULT),
                    $user['permission']
                ]],
            ['table' => 'setting',
                'fields' => ['title', 'description', 'about', 'keywords', 'logo', 'icon'],
                'values' => [
                    $setting['title'],
                    $setting['description'],
                    $setting['about'],
                    $setting['keywords'],
                    $setting['logo'],
                    $setting['icon'],
                ]]

        ];
        foreach ($menus as $menu) {

            array_push($tableInitializes, ['table' => 'menus',
                'fields' => ['name', 'url'],
                'values' => [
                    $menu['name'],
                    $menu['url'],
                ]]);

        }
        foreach ($tableInitializes as $tableInitialize) {

            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);

        }

    }

}




