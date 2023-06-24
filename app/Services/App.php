<?php

namespace App\Services;

use R;

class App
{
    /**
     * Функция start запускает все остальные функции класса
     */
    public static function start(): void
    {
        self::libs();
        self::db();
    }

    /**
     * Функция подключает все библиотеки находящиеся в конфигурационном файле app.php
     */
    public static function libs(): void
    {
        $config = require_once "config/app.php";

        foreach ($config["libs"] as $lib) {
            require_once "libs/" . $lib . ".php";
        }
    }

    public static function db(): void
    {
        $config = require_once "config/db.php";

        if ($config["enable"]){
            \R::setup( $config["url"],$config["username"],$config["password"]);
        }
        
        if (!\R::testConnection()){
            die("Error database connect");
        }
    }
}