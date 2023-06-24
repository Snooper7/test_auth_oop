<?php

namespace App\Services;
class Router
{
    private static array $list = [];

    public static function page($uri, $page_name): void
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
        ];
    }

    public static function enable(): void
    {
        $query = $_GET['q'];

        foreach (self::$list as $route) {
            if ($route["uri"] === '/' . $query) {
                require_once "views/pages/" . $route["page"] . ".php";
                die();
            }
        }

        self::no_page_found();
    }

    private static function no_page_found(): void
    {
        require_once "views/errors/404.php";
    }
}